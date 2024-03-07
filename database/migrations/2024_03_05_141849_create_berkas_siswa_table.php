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
        Schema::create('berkas_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('akta');
            $table->string('kk');
            $table->string('pas_foto');
            $table->string('shun');
            $table->string('ijazah');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('calon_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_siswa');
    }
};
