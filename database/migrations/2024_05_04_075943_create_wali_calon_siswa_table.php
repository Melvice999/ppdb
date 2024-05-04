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
        Schema::create('wali_calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp_wali');
            $table->string('pekerjaan_wali');

            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('calon_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_calon_siswa');
    }
};
