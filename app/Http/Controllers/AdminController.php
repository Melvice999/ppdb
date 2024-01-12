<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class AdminController extends Controller
{
    public function index()
    {
        $CalonSiswa = CalonSiswa::all();
        return view('calon_siswa.index', ['CalonSiswa' => $CalonSiswa]);
    }
}
