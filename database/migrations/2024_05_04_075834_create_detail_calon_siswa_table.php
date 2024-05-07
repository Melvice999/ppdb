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
        Schema::create('detail_calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('pas_foto');
            $table->enum('jalur_pendaftaran' , ['Reguler', 'Prestasi']);
            $table->enum('prodi', ['TBSM', 'TKRO', 'TKJ', 'AKL']);
            $table->enum('wearpack', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->string('asal_sekolah');
            $table->string('tahun_lulus');
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
        Schema::dropIfExists('detail_calon_siswa');
    }
};
