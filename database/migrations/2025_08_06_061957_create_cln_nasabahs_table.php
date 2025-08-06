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
            $table->string('nik',16);
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_hp',16);
            $table->text('email');

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
