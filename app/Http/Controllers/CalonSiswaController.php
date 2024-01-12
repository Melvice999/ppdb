<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class CalonSiswaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input 
        $request->validate([
            'nik'       => 'min:16',
            'kk'        => 'min:16',
        ], [
            'nik.min'   => 'Panjang NIK minimal 16 karakter',
            'kk.min'    => 'Panjang KK minimal 16 karakter',
        ]);
        // Simpan data ke database
        CalonSiswa::create($request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->to(url('/informasi-pendaftar'))->with('success', 'Data berhasil disimpan');
    }
}
