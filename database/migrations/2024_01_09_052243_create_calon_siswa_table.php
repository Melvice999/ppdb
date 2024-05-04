<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('no_pendaftaran');
            $table->string('password');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('rt');
            $table->string('rw');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('desa');
            $table->string('kode_pos')->nullable();;
            $table->year('tahun_daftar')->default(DB::raw('YEAR(NOW())'));
            $table->integer('status')->default(0);
            $table->enum('notifikasi_admin', ['Pendaftar Baru', 'Berkas Terupload', 'Berkas Update', 'Siap Ujian', 'Lulus Ujian']);


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};
