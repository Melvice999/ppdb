<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        // $users = CalonSiswa::all();
        $users = CalonSiswa::first();
        return view('siswa/siswa-beranda',['users' => $users]);
    }
}
