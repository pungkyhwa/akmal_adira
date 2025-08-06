<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prospek extends Model
{
    protected $table = 'prospek';
    protected $fillable = [
        'id_cln_nasabah',
        'id_harga_kendaraan',
        'id_tenor',
        'biaya_pinjaman',
        'cicilan',
    ];
    public function clnNasabah(){
        return $this->belongsTo(tenor::class,'id_cln_nasabah','id');
    }
    public function hargaKendaraan(){
        return $this->belongsTo(tenor::class,'id_harga_kendaraan','id');
    }
}
