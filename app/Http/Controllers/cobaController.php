<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        function pmt($rate, $nper, $pv, $fv = 0, $type = 0) {
            if ($rate == 0) {
                return -($pv + $fv) / $nper;
            } else {
                return -($rate * ($fv + $pv * pow(1 + $rate, $nper))) /
                    ((1 + $rate * $type) * (pow(1 + $rate, $nper) - 1));
            }
        }

        // Data
        $hargaKendaraan = 16500000;
        $maximalPencairan = 12200000;
        $biayaAdmin = 600000;
        $biayaMitra = 400000;
        $rate = 41; // bunga tahunan
        $uangMuka = $hargaKendaraan - $maximalPencairan;
        $rateAsuransi = 2.4 / 100;
        $tenor = 11;

        // Hitung biaya asuransi
        $biayaAsuransi = $rateAsuransi;

        // Hitung PV (pokok pinjaman bersih)
        $pv = $hargaKendaraan - ($uangMuka - $biayaAdmin - $biayaMitra - $biayaAsuransi);

        // Hitung bunga bulanan
        $rateBulanan = $rate / 1200;

        // Hitung angsuran
        $angsuran = pmt($rateBulanan, $tenor, -$pv);

        // Output hasil
        echo "maksimal pencairan",  $maximalPencairan,"<br>";
        echo "Pokok Pinjaman: Rp " . number_format($pv, 0, ',', '.'),"<br>";
        echo "Angsuran per bulan: Rp " . number_format($angsuran, 0, ',', '.');

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
