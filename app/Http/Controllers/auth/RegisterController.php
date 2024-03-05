<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AkunSiswa;
// use App\Providers\RouteServiceProvider;
use App\Models\User;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;'
// use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/registrasi-siswa');
    }

    protected function register(Request $request)
    {
        $request->validate([
            'nik'       => 'required|exists:calon_siswa|unique:akun_siswa',
            'email'     => 'required|email|ends_with:@gmail.com|unique:akun_siswa',
            'password'  => 'required|confirmed|min:6'
        ], [
            'nik.exists'            => 'NIK tidak Terdaftar.',
            'nik.unique'            => 'NIK sudah terdaftar.',
            'email.ends_with'       => 'Email harus @gmail.com.',
            'email.unique'          => 'Email sudah terdaftar.',
            'password.confirmed'    => 'Password tidak cocok.',
            'password.min'          => 'Password minimal 6 karakter.',

        ]);
        AkunSiswa::create([
            'nik' => $request->nik,
            'email' =>  $request->email,
            'password' => Hash::make($request->password,),
        ]);
        return redirect()
            ->to(url('auth-siswa/index'))
            ->with('success', 'Selamat anda berhasil mendaftar')
            ->with('sukses', 'silahkan login');
    }
}
