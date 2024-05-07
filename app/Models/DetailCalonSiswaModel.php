<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCalonSiswaModel extends Model
{
    use HasFactory;
    protected $table = 'detail_calon_siswa';
    protected $fillable = [
        'nik',
        'pas_foto',
        'jalur_pendaftaran',
        'prodi',
        'wearpack',
        'asal_sekolah',
        'tahun_lulus',
        'nama_ayah',
        'nama_ibu',
        'no_hp_wali',
        'pekerjaan_wali',
    ];

    // Foreign Key relasi one to many
    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'nik', 'nik');
    }
}
