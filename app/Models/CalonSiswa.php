<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class CalonSiswa extends Model implements Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'nik';

    protected $table = "calon_siswa";


    protected $fillable = [
        'nik',
        'jalur_pendaftaran',
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
        'kode_pos',
        'prodi',
        'wearpack',
        'asal_sekolah',
        'tahun_lulus',
        'nama_ayah',
        'nama_ibu',
        'no_hp_wali',
        'pekerjaan_wali',
        'tahun_daftar',
        'password',
        'pas_foto',
        'no_pendaftaran',
    ];

    // Implementasi metode routeNotificationForWhatsApp
    public function routeNotificationForWhatsApp()
    {
        return $this->no_hp; // Mengembalikan nomor HP dari atribut 'no_hp'
    }

    // fitur penelusuran Admin
    public function scopeAdmin($query, $keyword)
    {
        return $query->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('kecamatan', 'like', '%' . $keyword . '%')
            ->orWhere('tahun_daftar', 'like', '%' . $keyword . '%');
    }

    public function scopeHeadmaster($query, $keyword)
    {
        return $query->where('nama', 'like', '%' . $keyword . '%');
    }


    // Implementasi metode getAuthIdentifierName
    public function getAuthIdentifierName()
    {
        return 'nik';
    }

    // Implementasi metode getAuthIdentifier
    public function getAuthIdentifier()
    {
        return $this->getAttribute('nik');
    }

    // Implementasi metode getAuthPassword
    public function getAuthPassword()
    {
        return $this->password;
    }

    // Implementasi metode getRememberToken
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    // Implementasi metode setRememberToken
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    // Implementasi metode getRememberTokenName
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
