<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    use HasFactory;

    protected $table = "penilaian";

    protected $fillable = [
        'nik',
        'btq',
        'akademik',
        'berat_badan',
        'tinggi_badan',
        'tatto',
        'tindik',
        'tangan',
        'kaki',
        'riwayat_penyakit',
        'lainnya',
    ];
}
