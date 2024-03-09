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
            $table->string('kk');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('warga_negara', ['WNI', 'WNA']);
            $table->string('kode_pos')->nullable();;
            $table->enum('prodi', ['TBSM', 'TKRO', 'TKJ', 'AKL']);
            $table->enum('batik', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->enum('olahraga', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->enum('wearpack', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->string('asal_sekolah');
            $table->string('tahun_lulus');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp_wali');
            $table->string('desa_wali');
            $table->string('rt_wali');
            $table->string('rw_wali');
            $table->string('provinsi_wali');
            $table->string('kecamatan_wali');
            $table->string('kabupaten_wali');
            $table->string('kode_pos_wali')->nullable();;
            $table->string('pekerjaan_wali');
            $table->string('pendidikan_wali');
            $table->string('info_sekolah');
            $table->year('tahun_daftar')->default(DB::raw('YEAR(NOW())'));
            $table->integer('status')->default(0);

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
