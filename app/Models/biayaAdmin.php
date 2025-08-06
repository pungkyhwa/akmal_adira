<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class biayaAdmin extends Model
{
    protected $table = 'biaya_admin';
    protected $fillable = [
        'id_rate',
        'id_tenor',
        'biaya_admin',
        'min_pinjaman',
        'max_pinjaman',
    ];

    public function tenor(){
        return $this->belongsTo(tenor::class,'id_tenor','id');
    }
    public function rate(){
        return $this->belongsTo(rate::class,'id_rate','id');
    }
}
