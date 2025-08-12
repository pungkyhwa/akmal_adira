<?php

namespace App\Http\Controllers;

use App\Models\biayaAdmin;
use App\Models\biayaMitra;
use App\Models\tenor;
use Illuminate\Http\Request;

class cobaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = tenor::query()->with('asuransiRate');
        
        

        // Data
        $hargaKendaraan = 113700000;
        $terima_nasabah = 80000000;
        $pilih_tenor = 11;

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

        echo "Harga Kendaraan = ".$hargaKendaraan."<br>";
        echo "Terima Nasabah = ".$terima_nasabah."<br>";
        echo "Plafon Nasabah = ".$plofon_pinjaman."<br>";
        echo "Tenor dipilih = ".$pilih_tenor." bulan <br>";
        echo "Biaya Admin = ".$biayaAdmin."<br>";
        echo "fee Mitra = ".$biayaMitra."<br>";
        echo "efektif rate = ".$efektif_rate."<br>";
        echo "dp = ".$dp."<br>";
        echo "persen dp = ".number_format($persen_dp, 2, ',', '.')."<br>";
        echo "Pokok Hutang = ".$pokok_hutang."<br>";
        echo "asuransi rate =".$rateAsuransi." nominal = ".$nominal_rate_asuransi."<br>";
        echo "Total Pokok Hutang = ".$total_pokok_hutang."<br>";
        echo "Persen Bunga = ".number_format($persen_bunga, 2, ',', '.')."<br>";
        echo "Nominal Bunga = ".$nominal_bunga."<br>";
        echo "Total Hutang = ".$total_hutang."<br>";
        echo "Angsuran = ".$angsuran."<br>";

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'target' => '85156320270',
            'message' => 'Assalamulaikum..
            Nama : pungky
            whatapp : 089637587329
            Nilai Pinjaman: 5.000.000
            Angsuran : Rp 500.000
            tenor : 11 bulan',
          
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: 9GdkPSi2b2W9zzQ1X2NC' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
