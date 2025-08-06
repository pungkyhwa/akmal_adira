<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asuransiRate extends Model
{
    protected $table = 'asuransi_rate';
    protected $fillable = [
        'asuransi_rate',
        'satuan',
    ];
    
}
