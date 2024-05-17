<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class CalonSiswa extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'nik';

    protected $table = "calon_siswa";


    protected $fillable = [
        'nik',
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
        'tahun_daftar',
        'no_pendaftaran',
        'notifikasi_admin',
    ];

    // fitur penelusuran Admin
    public function scopeAdmin($query, $keyword)
    {
        return $query->whereHas('detailCalonSiswa', function ($query) use ($keyword) {
            $query->where('nik', 'like', '%' . $keyword . '%')
                ->orWhere('no_pendaftaran', 'like', '%' . $keyword . '%')
                ->orWhere('nama', 'like', '%' . $keyword . '%')
                ->orWhere('desa', 'like', '%' . $keyword . '%')
                ->orWhere('kecamatan', 'like', '%' . $keyword . '%')
                ->orWhere('tahun_daftar', 'like', '%' . $keyword . '%');
        });
    }

    public function scopeHeadmaster($query, $keyword)
    {
        return $query->whereHas('detailCalonSiswa', function ($query) use ($keyword) {
            $query->where('nik', 'like', '%' . $keyword . '%')
                ->orWhere('no_pendaftaran', 'like', '%' . $keyword . '%')
                ->orWhere('nama', 'like', '%' . $keyword . '%')
                ->orWhere('desa', 'like', '%' . $keyword . '%')
                ->orWhere('kecamatan', 'like', '%' . $keyword . '%')
                ->orWhere('tahun_daftar', 'like', '%' . $keyword . '%');
        });
    }

    // Foreign Key relasi one to one
    public function detailCalonSiswa()
    {
        return $this->hasOne(DetailCalonSiswaModel::class, 'nik', 'nik');
    }

    public function getAuthIdentifierName()
    {
        return 'nik';
    }

    public function getAuthIdentifier()
    {
         return $this->nik;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}