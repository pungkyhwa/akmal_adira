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
        Schema::create('biaya_mitra', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tenor');
            $table->integer('biaya_mitra');
            $table->integer('min_pinjaman');
            $table->integer('max_pinjaman');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_mitra');
    }
};
