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
        Schema::create('jumlah_suara', function (Blueprint $table) {
            $table->id();
            $table->string('kode_calon');
            $table->string('kode_anggota');
            $table->string('kode_lokasi');
            $table->string('company');
            $table->string('jumlah_suara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumlah_suara');
    }
};
