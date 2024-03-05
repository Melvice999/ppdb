<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\AkunSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaController extends Controller
{
 public function index(Request $request)
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();

  return view('siswa/siswa-beranda', ['user' => $user]);
 }

 public function pusatAkun()
 {
  return view('siswa/siswa-pusat-akun');
 }

 public function logout()
 {
  Auth::logout();
  return redirect('auth/siswa');
 }
}
