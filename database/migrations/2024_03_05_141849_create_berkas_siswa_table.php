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
            $table->string('akta')->nullable();
            $table->string('kk')->nullable();
            $table->string('shun')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('raport')->nullable();
            $table->string('transkip_nilai')->nullable();
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
