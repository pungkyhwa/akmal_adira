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
        Schema::create('biaya_admin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rate')->constrained('rate');
            $table->foreignId('id_tenor')->constrained('tenor');
            $table->decimal('biaya_admin');
            $table->decimal('min_pinjaman');
            $table->decimal('max_pinjaman');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_admin');
    }
};
