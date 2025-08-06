<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clnNasabah extends Model
{
    protected $table = 'cln_nasabah';
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'no_hp',
        'email',
    ];
}
