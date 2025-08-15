<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cln_nasabah', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_pinjaman',15,2);
            $table->string('nik',16); // No KTP
            $table->string('nohp');
            $table->string('email');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('alamat');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('nm_ibu');
            $table->date('tgl_janji');
            $table->string('merk_kendaraan');
            $table->string('thn_kendaraan');
            $table->string('tenor');
            $table->string('npwp')->nullable();
            $table->string('pekerjaan');
            $table->string('lama_bekerja');
            $table->string('plat_kendaraan');
            $table->string('foto_ktp');
            $table->string('foto_stnk');
            $table->string('voucher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cln_nasabah');
    }
};
