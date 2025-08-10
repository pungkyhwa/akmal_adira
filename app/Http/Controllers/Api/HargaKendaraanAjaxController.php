<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\hargaKendaraan;
use Illuminate\Http\Request;

class HargaKendaraanAjaxController extends Controller
{
    public function hargaKendaraan($jnsKendaraan, $merkKendaraan, $tipeKendaraan, $thnKendaraan){
        $hargaKendaraan = hargaKendaraan::where('id_jns_kendaraan', $jnsKendaraan)->where('id_merek_kendaraan', $merkKendaraan)->where('id_tipe_kendaraan', $tipeKendaraan)->where('id_tahun_kendaraan', $thnKendaraan)->first();
        return response()->json($hargaKendaraan);
    }
}
