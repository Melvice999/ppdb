<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiPengaturanModel extends Model
{
    use HasFactory;
    protected $table = "multi_pengaturan";


    protected $fillable = [
        'id',
        'nama',
    ];
}
