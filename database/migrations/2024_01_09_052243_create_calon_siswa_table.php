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
            $table->enum('notifikasi_admin', ['Pendaftar Baru', 'Cetak Formulir', 'Formulir Tercetak', 'Siap Ujian', 'Lulus Ujian',  'Tidak Lulus Ujian', 'Lengkapi Berkas', 'Berkas Terupload', 'Masukan Akta Yang Valid', 'Masukan KK Yang Valid', 'Masukan SHUN Yang Valid', 'Masukan Ijazah Yang Valid', 'Masukan Raport Yang Valid', 'Masukan Transkip Nilai Yang Valid', 'Masukan Pas Foto Yang Valid', 'Berkas Terupdate', 'Pendaftaran Selesai'
        ]);


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
