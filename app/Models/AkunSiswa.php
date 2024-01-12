<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CalonSiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AkunSiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "akun_siswa";

    protected $fillable = [
        'nik',
        'email',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function calonSiswa()
    // {
    //     return $this->belongsTo(CalonSiswa::class, 'nik', 'nik');
    // }

}
