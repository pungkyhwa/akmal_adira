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
        Schema::create('harga_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_merek_kendaraan');
            $table->integer('id_tipe_kendaraan');
            $table->integer('id_jenis_kendaraan');
            $table->integer('id_tahun_kendaraan');
            $table->integer('harga');
            $table->string('aktif',1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_kendaraan');
    }
};
