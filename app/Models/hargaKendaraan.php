<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hargaKendaraan extends Model
{
    protected $table = 'harga_kendaraan';
    protected $fillable = [
        'id_merek_kendaraan',
        'id_tipe_kendaraan',
        'id_jns_kendaraan',
        'id_tahun_kendaraan',
        'harga',
        'aktif',
    ];
    public function merekKendaraan(){
        return $this->belongsTo(merekKendaraan::class,'id_merek_kendaraan','id');
    }
    public function tipeKendaraan(){
        return $this->belongsTo(tipeKendaraan::class,'id_tipe_kendaraan','id');
    }
    public function jnsKendaraan(){
        return $this->belongsTo(jnsKendaraan::class,'id_jns_kendaraan','id');
    }
    public function tahunKendaraan(){
        return $this->belongsTo(tahunKendaraan::class,'id_tahun_kendaraan','id');
    }

}
