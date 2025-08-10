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

    public function storeSimulasi(Request $request)
    {

        function pmt($rate, $nper, $pv, $fv = 0, $type = 0)
        {
            if ($rate == 0) {
                return -($pv + $fv) / $nper;
            } else {
                return -($rate * ($fv + $pv * pow(1 + $rate, $nper))) /
                    ((1 + $rate * $type) * (pow(1 + $rate, $nper) - 1));
            }
        }

        $hargaKendaraan = str_replace('.', '', $request->input('hargaKendaraan')); //
        $maximalPencairan = str_replace('.', '', $request->input('maksPencairan'));
        $tenor = tenor::where('id', $request->tenor)->first();
        $biayaAdmin = biayaAdmin::where('id_tenor', $request->tenor)->first();
        $biayaMitra = biayaMitra::where('id_tenor', $request->tenor)->first();
        $rate = rate::where('id', $biayaAdmin->id_rate)->first();
        $uangMuka = $hargaKendaraan - $maximalPencairan;
        $rateAsuransi = asuransiRate::where('id', $tenor->id_asuransi_rate)->first();
        $biayaAsuransi = $rateAsuransi;

        // Hitung PV (pokok pinjaman bersih)
        $pv = $hargaKendaraan - ($uangMuka - $biayaAdmin->biaya_admin - $biayaMitra->biaya_mitra - $biayaAsuransi->asuransi_rate);

        // Hitung bunga bulanan
        $rateBulanan = $rate->rate / 1200;

        // Hitung angsuran
        $angsuran = pmt($rateBulanan, $tenor->tenor, -$pv);
        $angsuran = ceil($angsuran / 1000) * 1000;

        // Output hasil
        $results = [
            'maksimal_pencairan' => number_format($maximalPencairan, 0, ',', '.'),
            'pokok_pinjaman' => number_format($pv, 0, ',', '.'),
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
            'target' => '625156320270',
            'message' => 'Assalamulaikum..
            Nama : pungky
            whatapp : 089637587329
            Nilai Pinjaman: 5.000.000
            Angsuran : Rp 500.000
            tenor : 11 bulan',
          
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: nxVm87zya9w9XsVekPC7' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


        return back()->with(['success' => true, 'results' => $results]);
        // echo "maksimal pencairan", $maximalPencairan, "<br>";
        // echo "Pokok Pinjaman: Rp " . number_format($pv, 0, ',', '.'), "<br>";
        // echo "Angsuran per bulan: Rp " . number_format($angsuran, 0, ',', '.');
    }
}
