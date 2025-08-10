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
        $angsuran = 1452743;
        $angsuran = ceil($angsuran / 1000)*1000;
        echo $angsuran;
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
