<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tenor extends Model
{
    protected $table = 'tenor';
    protected $fillable = [
        'tenor',
        'satuan',
        'id_asuransi_rate',
    ];

    public function asuransiRate(){
        return $this->belongsTo(asuransiRate::class,'id_asuransi_rate','id');
    }
}
