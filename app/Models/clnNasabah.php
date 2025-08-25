<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clnNasabah extends Model
{
    protected $table = 'cln_nasabah';
    protected $fillable = [
        'jumlah_pinjaman',
        'namaktp',
        'nik',
        'nohp',
        'email',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat',
        'tmp_lahir',
        'tgl_lahir',
        'nm_ibu',
        'tgl_janji',
        'merk_kendaraan',
        'thn_kendaraan',
        'tenor',
        'pekerjaan',
        'lama_bekerja',
        'plat_kendaraan',
        'foto_ktp',
        'foto_stnk',
        'voucher',
    ];

    public function idTenor(){
        return $this->belongsTo(tenor::class, 'tenor', 'id');
    }

    public function idMerkKendaraan(){
        return $this->belongsTo(merekKendaraan::class,'merk_kendaraan','id');
    }

    public function idTahunKendaraan(){
        return $this->belongsTo(tahunKendaraan::class,'thn_kendaraan','id');
    }
}
