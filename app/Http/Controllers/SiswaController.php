<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\AkunSiswa;
use App\Models\BerkasSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
  $berkas = BerkasSiswa::where('nik', $nik)->first();

  $data = [
   'title' => 'Pengaturan',
   'berkas' => $berkas,
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
  // $extensionPasFoto = $pasFoto->getClientOriginalExtension();
  // $pasFotoName = $nik . '-Pas-Foto.' . $extensionPasFoto;
  $pasFotoName = $nik . '-Pas-Foto.png';
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
   'title' => 'Berkas ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/berkas/siswa-update-berkas', $data, ['user' => $user]);
 }

 public function updateBerkasAktaPost(Request $request, $id)
 {
  $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

  if ($request->hasFile('akta')) {
   // Hapus berkas lama jika ada
   $aktaLama = $berkasSiswa->akta;
   if ($aktaLama) {
    Storage::delete($aktaLama);
   }

   $aktaName = $id . '-Akta.pdf';

   // Simpan berkas baru
   $request->file('akta')->storeAS('siswa/akta', $aktaName, 'public');
  }

  BerkasSiswa::where('nik', $id)->update([
   'akta' => $aktaName,
  ]);

  return redirect()->back()->with('success', 'Akta berhasil diupdate.');
 }

 public function updateBerkasKKPost(Request $request, $id)
 {
  $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

  if ($request->hasFile('kk')) {
   // Hapus berkas lama jika ada
   $kkLama = $berkasSiswa->kk;
   if ($kkLama) {
    Storage::delete($kkLama);
   }

   $kkName = $id . '-KK.pdf';

   // Simpan berkas baru
   $request->file('kk')->storeAS('siswa/kk', $kkName, 'public');
  }

  BerkasSiswa::where('nik', $id)->update([
   'kk' => $kkName,
  ]);

  return redirect()->back()->with('success', 'KK berhasil diupdate.');
 }

 public function updateBerkasPasFotoPost(Request $request, $id)
 {
  $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

  if ($request->hasFile('pas_foto')) {
   // Hapus berkas lama jika ada
   $pasFotoLama = $berkasSiswa->pas_foto;
   if ($pasFotoLama) {
    Storage::delete($pasFotoLama);
   }

   // pas foto karena terdapat ekstensi png/jpg/jpeg 
   // $pasFoto = $request->file('pas_foto');
   // $extensionPasFoto = $pasFoto->getClientOriginalExtension();
   // $pasFotoName = $id . '-Pas-Foto.png' . $extensionPasFoto;
   $pasFotoName = $id . '-Pas-Foto.png';

   // Simpan berkas baru
   $request->file('pas_foto')->storeAS('siswa/pas-foto', $pasFotoName, 'public');
  }

  BerkasSiswa::where('nik', $id)->update([
   'pas_foto' => $pasFotoName,
  ]);

  return redirect()->back()->with('success', 'Foto berhasil diupdate.');
 }

 public function updateBerkasShunPost(Request $request, $id)
 {
  $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

  if ($request->hasFile('shun')) {
   // Hapus berkas lama jika ada
   $shunLama = $berkasSiswa->shun;
   if ($shunLama) {
    Storage::delete($shunLama);
   }

   $shunName = $id . '-SHUN.pdf';

   // Simpan berkas baru
   $request->file('shun')->storeAS('siswa/shun', $shunName, 'public');
  }

  BerkasSiswa::where('nik', $id)->update([
   'shun' => $shunName,
  ]);

  return redirect()->back()->with('success', 'SHUN berhasil diupdate.');
 }

 public function updateBerkasIjazahPost(Request $request, $id)
 {
  $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

  if ($request->hasFile('ijazah')) {
   // Hapus berkas lama jika ada
   $ijazahLama = $berkasSiswa->ijazah;
   if ($ijazahLama) {
    Storage::delete($ijazahLama);
   }

   $ijazahName = $id . '-Ijazah.pdf';

   // Simpan berkas baru
   $request->file('ijazah')->storeAS('siswa/ijazah', $ijazahName, 'public');
  }

  BerkasSiswa::where('nik', $id)->update([
   'ijazah' => $ijazahName,
  ]);

  return redirect()->back()->with('success', 'Ijazah berhasil diupdate.');
 }

 public function cetakFormulir()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();

  $data = [
   'title' => 'Cetak Formulir ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/cetak-formulir/siswa-cetak-formulir', $data, ['user' => $user]);
 }

 public function pengaturanAkun()
 {
  $user = Auth::user();
  $email = $user->email;

  $akun = AkunSiswa::where('email', $email)->first();
  $nik = $akun->nik;
  $user = CalonSiswa::where('nik', $nik)->first();
  $berkas = BerkasSiswa::where('nik', $nik)->first();

  $data = [
   'akun' => $akun,
   'title' => 'Pengaturan Akun ' . $user->nama,
   'berkas' => $berkas,
  ];

  return view('siswa/pengaturan-akun/siswa-pengaturan-akun', $data, ['user' => $user]);
 }

 public function pengaturanEmailPost(Request $request)
 {
  $request->validate([
   'email'     => 'required|email|ends_with:@gmail.com|unique:akun_siswa',
  ], [
   'email.ends_with'       => 'Email harus @gmail.com.',
   'email.unique'          => 'Email sudah terdaftar.',
  ]);
  $nik = $request->nik;
  $email = $request->email;
  AkunSiswa::where('nik', $nik)->update([
   'email' => $email,
  ]);
  return redirect()->back()->with('success', 'Email berhasil diubah.');
 }

 public function pengaturanPasswordPost(Request $request)
 {
  $request->validate([
   'password'  => 'required|confirmed|min:6'
  ], [
   'password.confirmed'    => 'Password tidak cocok.',
   'password.min'          => 'Password minimal 6 karakter.',
  ]);
  $nik = $request->nik;
  $password = $request->password;
  AkunSiswa::where('nik', $nik)->update([
   'password' => $password,
  ]);
  return redirect()->back()->with('success', 'Password berhasil diubah.');
 }

 public function logout()
 {
  Auth::logout();
  return redirect('auth/siswa');
 }
}
