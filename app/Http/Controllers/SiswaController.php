<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\AkunSiswa;
use App\Models\BerkasSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class SiswaController extends Controller
{
 public function index()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();


  $data = [
   'title' => 'Profil ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/siswa-profil', $data, ['user' => $user]);
 }

 public function formulirPendaftaran()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();

  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();

  $data = [
   'title' => 'Formulir Pendaftaran ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/siswa-formulir-pendaftaran', $data, ['user' => $user]);
 }

 public function pengaturan()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();

  $data = [
   'title' => 'Pengaturan',
  ];

  return view('siswa/siswa-pengaturan', $data, ['user' => $user]);
 }

 // Profil
 public function uploadBerkas()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();


  $data = [
   'title' => 'Upload Berkas ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/berkas/siswa-upload-berkas', $data, ['user' => $user]);
 }

 // Profil
 public function uploadBerkasPost(Request $request)
 {
  $request->validate([
   'nik' => 'required|unique:berkas_siswa,nik',
  ], ['nik.unique' => 'Berkas sudah terisi.']);



  $akta = $request->file('akta');
  $kk = $request->file('kk');
  $pasFoto = $request->file('pas_foto');
  $shun = $request->file('shun');
  $ijazah = $request->file('ijazah');
  $nik = $request->nik;

  $aktaName = $nik . '-Akta.pdf';
  $kkName = $nik . '-KK.pdf';
  // pas foto karena terdapat ekstensi png/jpg/jpeg 
  $extensionPasFoto = $pasFoto->getClientOriginalExtension();
  $pasFotoName = $nik . '-Pas-Foto.' . $extensionPasFoto;
  $shunName = $nik . '-SHUN.pdf';
  $ijazahName = $nik . '-Ijazah.pdf';

  // Save akta ke database
  $berkasDetail = new BerkasSiswa();

  $berkasDetail->nik = $nik;
  $berkasDetail->akta = $aktaName;
  $berkasDetail->kk = $kkName;
  $berkasDetail->pas_foto = $pasFotoName;
  $berkasDetail->shun = $shunName;
  $berkasDetail->ijazah = $ijazahName;

  $berkasDetail->save();

  // Save akta ke folder storage/app/public/siswa
  $akta->storeAs('siswa/akta', $aktaName, 'public');
  $kk->storeAs('siswa/kk', $kkName, 'public');
  $pasFoto->storeAs('siswa/pas-foto', $pasFotoName, 'public');
  $shun->storeAs('siswa/shun', $shunName, 'public');
  $ijazah->storeAs('siswa/ijazah', $ijazahName, 'public');

  return redirect()->to(url('siswa/profil'))->with('success', 'Berkas berhasil diupload');
 }

 public function updateBerkas()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();


  $data = [
   'title' => 'Upload Berkas ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/berkas/siswa-update-berkas', $data, ['user' => $user]);
 }

 public function logout()
 {
  Auth::logout();
  return redirect('auth/siswa');
 }
}
