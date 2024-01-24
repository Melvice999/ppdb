<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = "calon_siswa";


    protected $fillable = [
        'nik',
        'kk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'desa',
        'rt',
        'rw',
        'provinsi',
        'kecamatan',
        'kabupaten',
        'jenis_kelamin',
        'warga_negara',
        'kode_pos',
        'prodi',
        'batik',
        'olahraga',
        'wearpack',
        'asal_sekolah',
        'tahun_lulus',
        'nama_ayah',
        'nama_ibu',
        'no_hp_wali',
        'desa_wali',
        'rt_wali',
        'rw_wali',
        'provinsi_wali',
        'kecamatan_wali',
        'kabupaten_wali',
        'kode_pos_wali',
        'pekerjaan_wali',
        'pendidikan_wali',
        'info_sekolah',
        'tahun_daftar',
    ];

}
