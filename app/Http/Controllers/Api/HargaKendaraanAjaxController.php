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
    
    public function merekKendaraan($idJnsKendaraan){
        $merekKendaraan = hargaKendaraan::where('harga_kendaraan.id_jns_kendaraan', '=', $idJnsKendaraan )
        ->join('jns_kendaraan', 'harga_kendaraan.id_jns_kendaraan', '=', 'jns_kendaraan.id')
        ->join('merek_kendaraan', 'harga_kendaraan.id_merek_kendaraan', '=', 'merek_kendaraan.id')
        ->join('tipe_kendaraan', 'harga_kendaraan.id_tipe_kendaraan', '=', 'tipe_kendaraan.id')
        ->join('tahun_kendaraan', 'harga_kendaraan.id_tahun_kendaraan', '=', 'tahun_kendaraan.id')
        ->select(
            'harga_kendaraan.id_merek_kendaraan',
            'merek_kendaraan.merek_kendaraan',
            'merek_kendaraan.id'
        )
        ->groupBy(
            'harga_kendaraan.id_merek_kendaraan',
            'merek_kendaraan.merek_kendaraan',
            'merek_kendaraan.id'
        )
        ->get();

        return response()->json($merekKendaraan);
    }

    public function tipeKendaraan($idMerekKendaraan){
        $tipeKendaraan = hargaKendaraan::where('harga_kendaraan.id_merek_kendaraan', '=', $idMerekKendaraan )
        ->join('jns_kendaraan', 'harga_kendaraan.id_jns_kendaraan', '=', 'jns_kendaraan.id')
        ->join('merek_kendaraan', 'harga_kendaraan.id_merek_kendaraan', '=', 'merek_kendaraan.id')
        ->join('tipe_kendaraan', 'harga_kendaraan.id_tipe_kendaraan', '=', 'tipe_kendaraan.id')
        ->join('tahun_kendaraan', 'harga_kendaraan.id_tahun_kendaraan', '=', 'tahun_kendaraan.id')
        ->select(
            'harga_kendaraan.id_tipe_kendaraan',
            'tipe_kendaraan.tipe_kendaraan',
            'tipe_kendaraan.id'
        )
        ->groupBy(
            'harga_kendaraan.id_tipe_kendaraan',
            'tipe_kendaraan.tipe_kendaraan',
            'tipe_kendaraan.id'
        )
        ->get();
        return response()->json($tipeKendaraan);
    }
    
    public function tahunKendaraan($idTipeKendaraan){
        $tahunKendaraan = hargaKendaraan::where('harga_kendaraan.id_tipe_kendaraan', '=', $idTipeKendaraan )
        ->join('jns_kendaraan', 'harga_kendaraan.id_jns_kendaraan', '=', 'jns_kendaraan.id')
        ->join('merek_kendaraan', 'harga_kendaraan.id_merek_kendaraan', '=', 'merek_kendaraan.id')
        ->join('tipe_kendaraan', 'harga_kendaraan.id_tipe_kendaraan', '=', 'tipe_kendaraan.id')
        ->join('tahun_kendaraan', 'harga_kendaraan.id_tahun_kendaraan', '=', 'tahun_kendaraan.id')
        ->select(
            'harga_kendaraan.id_tahun_kendaraan',
            'tahun_kendaraan.tahun_kendaran',
            'tahun_kendaraan.id'
        )
        ->groupBy(
            'harga_kendaraan.id_tahun_kendaraan',
            'tahun_kendaraan.tahun_kendaran',
            'tahun_kendaraan.id'
        )
        ->get();
        return response()->json($tahunKendaraan);
    }
}
