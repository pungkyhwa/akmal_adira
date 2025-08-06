<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class biayaMitra extends Model
{
    protected $table = 'biaya_mitra';
    protected $fillable = [
        'id_tenor',
        'min_pinjaman',
        'max_pinjaman',
        'biaya_mitra',
    ];

    public function tenor(){
        return $this->belongsTo(tenor::class,'id_tenor','id');
    }
}
