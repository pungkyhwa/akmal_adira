<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakWhatsapp extends Model
{
    protected $table = 'kontak_whatsapp';

    protected $fillable = [
        'nama',
        'nomor_whatsapp'
    ];
}
