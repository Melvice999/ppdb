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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->enum('notifikasi', ['Pendaftaran sedang diproses', 'Lengkapi Berkas', 'Perbarui Akta Yang Valid', 'Perbarui KK Yang Valid', 'Perbarui Pas Foto Yang Valid', 'Perbarui Ijazah Yang Valid', 'Perbarui SHUN Yang Valid', 'Perbarui Raport Yang Valid', 'Perbarui Transkip Nilai Yang Valid', 'Silahkan mengikuti ujian di SMK Maarif NU Doro dengan membawa formulir yang telah dicetak', 'Selamat anda lulus ujian pendaftaran']);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('calon_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
