<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoPendaftaranModel extends Model
{
  use HasFactory;
  protected $table = "no_pendaftaran";
  protected $primaryKey = 'no_pendaftaran';
  protected $fillable = [
    'nik',
    'no_pendaftaran',
  ];
  protected $keyType = 'string';
}
