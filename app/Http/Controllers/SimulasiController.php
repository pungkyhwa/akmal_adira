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
        return view('admin.simulasi.index', compact('jnsKendaraan', 'merkKendaraan', 'thnKendaraan', 'tipeKendaraan', 'tenor'));
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

        $hargaKendaraan = str_replace('.', '',$request->input('hargaKendaraan')); //
        $maximalPencairan = $hargaKendaraan * 0.8;
        $tenor = tenor::where('id', $request->tenor)->first();
        $biayaAdmin = biayaAdmin::where('id_tenor', $request->tenor)->first();
        $biayaMitra = biayaMitra::where('id_tenor', $request->tenor)->first();
        $rate = rate::where('id', $biayaAdmin->id_rate)->first();
        $uangMuka = $hargaKendaraan - $maximalPencairan;
        $rateAsuransi = asuransiRate::where('id',$tenor->id_asuransi_rate)->first();
        $biayaAsuransi = $rateAsuransi;
        
        // Hitung PV (pokok pinjaman bersih)
        $pv = $hargaKendaraan - ($uangMuka - $biayaAdmin->biaya_admin - $biayaMitra->biaya_mitra - $biayaAsuransi->asuransi_rate);

        // Hitung bunga bulanan
        $rateBulanan = $rate->rate / 1200;

        // Hitung angsuran
        $angsuran = pmt($rateBulanan, $tenor->tenor, -$pv);

        // Output hasil
        echo "maksimal pencairan", $maximalPencairan, "<br>";
        echo "Pokok Pinjaman: Rp " . number_format($pv, 0, ',', '.'), "<br>";
        echo "Angsuran per bulan: Rp " . number_format($angsuran, 0, ',', '.');
    }
}
