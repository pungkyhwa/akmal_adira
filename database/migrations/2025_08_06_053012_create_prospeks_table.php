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
        Schema::create('prospek', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cln_nasabah');
            $table->integer('id_harga_kendaraan');
            $table->integer('id_tenor');
            $table->integer('biaya_pinjaman');
            $table->integer('cicilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospek');
    }
};
