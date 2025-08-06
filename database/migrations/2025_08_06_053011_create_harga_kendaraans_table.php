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
            $table->foreignId('id_merek_kendaraan')->constrained('merek_kendaraan');
            $table->foreignId('id_tipe_kendaraan')->constrained('tipe_kendaraan');
            $table->foreignId('id_jns_kendaraan')->constrained('jns_kendaraan');
            $table->foreignId('id_tahun_kendaraan')->constrained('tahun_kendaraan');
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
