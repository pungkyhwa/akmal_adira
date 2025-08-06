<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipeKendaraan extends Model
{
    protected $table = 'tipe_kendaraan';
    protected $fillable = [
        'tipe_kendaraan',
        'kode_tipe',
    ];
}
