<?php

namespace App\Http\Controllers;

use App\Models\asuransiRate;
use App\Models\biayaAdmin;
use App\Models\biayaMitra;
use App\Models\hargaKendaraan;
use App\Models\jnsKendaraan;
use App\Models\merekKendaraan;
use App\Models\rate;
use App\Models\tahunKendaraan;
use App\Models\tenor;
use App\Models\tipeKendaraan;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class SimulasiController extends Controller
{
    public function index()
    {
        $jnsKendaraan = jnsKendaraan::get();
        $merkKendaraan = merekKendaraan::get();
        $thnKendaraan = tahunKendaraan::get();
        $tipeKendaraan = tipeKendaraan::get();
        $tenor = tenor::get();
        return view('landingPage.simulasi.index', compact('jnsKendaraan', 'merkKendaraan', 'thnKendaraan', 'tipeKendaraan', 'tenor'));
    }

    public function storeSimulasi(Request $request){
        $hargaKendaraan = str_replace('.', '', $request->input('hargaKendaraan'));
        $terima_nasabah = str_replace('.', '', $request->input('maksPencairan'));
        $queryTenor = tenor::where('id',$request->tenor)->select('*')->first();
        $pilih_tenor = $queryTenor->tenor;
        
        $query = tenor::query()->with('asuransiRate');
        
        // mencari biaya admin dari tenor batas pencairan
        $queryBiayaAdmin = biayaAdmin::join('tenor','tenor.id','=','biaya_admin.id_tenor')
        ->join('rate', 'rate.id', '=', 'biaya_admin.id_rate') 
        ->select('biaya_admin.id', 'biaya_admin.id_tenor', 'biaya_admin.id_rate', 'biaya_admin.biaya_admin', 'biaya_admin.min_pinjaman', 'biaya_admin.max_pinjaman', 'tenor.tenor', 'rate.rate')  
        ->where('tenor.tenor', $pilih_tenor)
        ->whereRaw($terima_nasabah.' BETWEEN biaya_admin.min_pinjaman AND biaya_admin.max_pinjaman')
        ->first();
        $biayaAdmin = $queryBiayaAdmin->biaya_admin;
        $efektif_rate = $queryBiayaAdmin->rate; 
        $queryBiayaMitra = biayaMitra::join('tenor','tenor.id','=','biaya_mitra.id_tenor')->select('biaya_mitra.id', 'biaya_mitra.id_tenor', 'biaya_mitra.biaya_mitra', 'biaya_mitra.min_pinjaman', 'biaya_mitra.max_pinjaman', 'tenor.tenor')  
        ->where('tenor.tenor', $pilih_tenor)
        ->whereRaw($terima_nasabah.' BETWEEN biaya_mitra.min_pinjaman AND biaya_mitra.max_pinjaman')
        ->first();
        $biayaMitra = $queryBiayaMitra->biaya_mitra;
        
        $plofon_pinjaman = $terima_nasabah + $biayaMitra + $biayaAdmin;
        $dp = $hargaKendaraan - $plofon_pinjaman;
        $persen_dp = ($dp/$hargaKendaraan)*100;
        $pokok_hutang = $hargaKendaraan - $dp;

        // cek asuransi rate dari tenor di database
        $rateAsuransiQuery = $query->where('tenor', $pilih_tenor)->first();
        $rateAsuransi = ($rateAsuransiQuery->asuransiRate->asuransi_rate);
        $nominal_rate_asuransi = ($hargaKendaraan * $rateAsuransi)/100;
        $total_pokok_hutang = $pokok_hutang+$nominal_rate_asuransi;
        $persen_bunga =(($pilih_tenor * ($efektif_rate / 1200) / (1 - pow((1 + $efektif_rate / 1200), -$pilih_tenor))) - 1) * (1200 / $pilih_tenor);
        $nominal_bunga = ($persen_bunga / 1200) * $pilih_tenor * $total_pokok_hutang;
        $total_hutang = $total_pokok_hutang+$nominal_bunga;
        $angsuran = round(($total_hutang / $pilih_tenor) + 1000, -3);

 
        $results = [
            'maksimal_pencairan' => number_format($terima_nasabah, 0, ',', '.'),
            'pokok_pinjaman' => number_format($total_hutang, 0, ',', '.'),
            'angsuran_per_bulan' => number_format($angsuran, 0, ',', '.'),
            'hargaKendaraan' => $hargaKendaraan
        ];
        // kirim wa
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => '82113751469',
            'message' => 'Assalamulaikum..
            Nama : pungky
            whatapp : 089637587329

            Harga Kendaraan = '.number_format($hargaKendaraan, 0, ',', '.').';
            Terima Nasabah = '.number_format($terima_nasabah, 0, ',', '.').';
            Plafon Nasabah = '.number_format($plofon_pinjaman, 0, ',', '.').';
            Tenor dipilih = '.$pilih_tenor.' bulan;
            Biaya Admin = '.number_format($biayaAdmin, 0, ',', '.').';
            fee Axi = '.number_format($biayaMitra, 0, ',', '.').';
            efektif rate = '.$efektif_rate.';
            dp = '.number_format($dp, 0, ',', '.').';
            persen dp = '.$persen_dp.';
            Pokok Hutang = '.number_format($pokok_hutang, 0, ',', '.').';
            asuransi rate = '.$rateAsuransi.' nominal = '.number_format($nominal_rate_asuransi, 0, ',', '.').';
            Total Pokok Hutang = '.number_format($total_pokok_hutang, 0, ',', '.').';
            Persen Bunga = '.$persen_bunga.';
            Nominal Bunga = '.number_format($nominal_bunga, 0, ',', '.').';
            Total Hutang = '.number_format($total_hutang, 0, ',', '.').';
            Angsuran = '.number_format($angsuran, 0, ',', '.').'
            ',
          
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: 9GdkPSi2b2W9zzQ1X2NC' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return back()->with(['success' => true, 'results' => $results]);

    }
    // public function storeSimulasi(Request $request)
    // {

    //     function pmt($rate, $nper, $pv, $fv = 0, $type = 0)
    //     {
    //         if ($rate == 0) {
    //             return -($pv + $fv) / $nper;
    //         } else {
    //             return -($rate * ($fv + $pv * pow(1 + $rate, $nper))) /
    //                 ((1 + $rate * $type) * (pow(1 + $rate, $nper) - 1));
    //         }
    //     }

    //     $hargaKendaraan = str_replace('.', '', $request->input('hargaKendaraan')); 
    //     $maximalPencairan = str_replace('.', '', $request->input('maksPencairan'));
    //     $tenor = tenor::where('id', $request->tenor)->first();
    //     $biayaAdmin = biayaAdmin::where('id_tenor', $request->tenor)->first();
    //     $biayaMitra = biayaMitra::where('id_tenor', $request->tenor)->first();
    //     $rate = rate::where('id', $biayaAdmin->id_rate)->first();
    //     $uangMuka = $hargaKendaraan - $maximalPencairan;
    //     $rateAsuransi = asuransiRate::where('id', $tenor->id_asuransi_rate)->first();
    //     $biayaAsuransi = $rateAsuransi;

    //     // Hitung PV (pokok pinjaman bersih)
    //     $pv = $hargaKendaraan - ($uangMuka - $biayaAdmin->biaya_admin - $biayaMitra->biaya_mitra - $biayaAsuransi->asuransi_rate);

    //     // Hitung bunga bulanan
    //     $rateBulanan = $rate->rate / 1200;

    //     // Hitung angsuran
    //     $angsuran = pmt($rateBulanan, $tenor->tenor, -$pv);
    //     $angsuran = ceil($angsuran / 1000) * 1000;

    //     // Output hasil
    //     $results = [
    //         'maksimal_pencairan' => number_format($maximalPencairan, 0, ',', '.'),
    //         'pokok_pinjaman' => number_format($pv, 0, ',', '.'),
    //         'angsuran_per_bulan' => number_format($angsuran, 0, ',', '.'),
    //         'hargaKendaraan' => $hargaKendaraan
    //     ];

    //     // kirim wa
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://api.fonnte.com/send',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS => array(
    //         'target' => '82113751469',
    //         'message' => 'Assalamulaikum..
    //         Nama : pungky
    //         whatapp : 089637587329
    //         Nilai Pinjaman: Rp '.number_format($maximalPencairan, 0, ',', '.').'
    //         Angsuran : Rp '.number_format($angsuran, 0, ',', '.').'
    //         tenor : '.$tenor->tenor.' bulan',
          
    //     ),
    //     CURLOPT_HTTPHEADER => array(
    //         'Authorization: 9GdkPSi2b2W9zzQ1X2NC' //change TOKEN to your actual token
    //     ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     // echo $response;
        


    //     return back()->with(['success' => true, 'results' => $results, 'resporns'=>$response]);
    //     // echo "maksimal pencairan", $maximalPencairan, "<br>";
    //     // echo "Pokok Pinjaman: Rp " . number_format($pv, 0, ',', '.'), "<br>";
    //     // echo "Angsuran per bulan: Rp " . number_format($angsuran, 0, ',', '.');
    // }
}
