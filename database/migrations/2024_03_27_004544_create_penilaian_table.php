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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->enum('btq', ['Lancar', 'Sedang', 'Kurang'])->nullable();
            $table->string('akademik')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tatto')->nullable();
            $table->string('tindik')->nullable();
            $table->string('tangan')->nullable();
            $table->string('kaki')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('lainnya')->nullable();
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('calon_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
