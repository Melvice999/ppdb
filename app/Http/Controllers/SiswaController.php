<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
// use App\Models\AkunSiswa;
use App\Models\BerkasSiswa;
use App\Models\NotifikasiModel;
use App\Models\PenilaianModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;


class SiswaController extends Controller
{
  public function index()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;


    $user = CalonSiswa::where('nik', $nik)->first();
    $notifikasi = NotifikasiModel::where('nik', $nik)->first();
    $berkas = BerkasSiswa::where('nik', $nik)->first();


    $data = [
      'notifikasi'    => $notifikasi,
      'title' => 'Profil ' . $user->nama,
      'berkas' => $berkas,
    ];

    return view('siswa/siswa-profil', $data, ['user' => $user]);
  }

  public function formulirPendaftaran()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

    $user = CalonSiswa::where('nik', $nik)->first();
    $berkas = BerkasSiswa::where('nik', $nik)->first();
    $penilaian = PenilaianModel::where('nik', $nik)->first();


    $data = [
      'title' => 'Formulir Pendaftaran ' . $user->nama,
      'penilaian' => $penilaian,
      'berkas' => $berkas,
    ];

    return view('siswa/siswa-formulir-pendaftaran', $data, ['user' => $user]);
  }

  public function pengaturan()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

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
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

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
    $shun = $request->file('shun');
    $ijazah = $request->file('ijazah');
    $raport = $request->file('raport');
    $transkip_nilai = $request->file('transkip_nilai');
    $nik = $request->nik;

    $aktaName = $nik . '-Akta.pdf';
    $kkName = $nik . '-KK.pdf';
    $shunName = $nik . '-SHUN.pdf';
    $ijazahName = $nik . '-Ijazah.pdf';
    $raportName = $nik . '-Raport.pdf';
    $transkipNilaiName = $nik . '-TranskipNilai.pdf';

    // Save akta ke database
    $berkasDetail = new BerkasSiswa();

    $berkasDetail->nik = $nik;
    $berkasDetail->akta = $aktaName;
    $berkasDetail->kk = $kkName;
    $berkasDetail->shun = $shunName;
    $berkasDetail->ijazah = $ijazahName;
    $berkasDetail->raport = $raportName;
    $berkasDetail->transkip_nilai = $transkipNilaiName;

    $berkasDetail->save();
    CalonSiswa::where('nik', $nik)->update(['notifikasi_admin' => 'Berkas Terupload']);

    // Save akta ke folder storage/app/public/siswa
    $akta->storeAs('siswa/akta', $aktaName, 'public');
    $kk->storeAs('siswa/kk', $kkName, 'public');
    $shun->storeAs('siswa/shun', $shunName, 'public');
    $ijazah->storeAs('siswa/ijazah', $ijazahName, 'public');
    $raport->storeAs('siswa/raport', $raportName, 'public');
    $transkip_nilai->storeAs('siswa/transkip-nilai', $transkipNilaiName, 'public');

    return redirect()->to(url('siswa/profil'))->with('success', 'Berkas berhasil diupload');
  }

  public function updateBerkas()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

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

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

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
    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);


    return redirect()->back()->with('success', 'KK berhasil diupdate.');
  }

  public function updateBerkasPasFotoPost(Request $request, $id)
  {
    $berkasSiswa = CalonSiswa::where('nik', $id)->first();

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

    CalonSiswa::where('nik', $id)->update([
      'pas_foto' => $pasFotoName,
    ]);

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

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

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

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

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

    return redirect()->back()->with('success', 'Ijazah berhasil diupdate.');
  }

  public function updateBerkasRaportPost(Request $request, $id)
  {
    $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

    if ($request->hasFile('raport')) {
      // Hapus berkas lama jika ada
      $raportLama = $berkasSiswa->raport;
      if ($raportLama) {
        Storage::delete($raportLama);
      }

      $raportName = $id . '-Raport.pdf';

      // Simpan berkas baru
      $request->file('raport')->storeAS('siswa/raport', $raportName, 'public');
    }

    BerkasSiswa::where('nik', $id)->update([
      'raport' => $raportName,
    ]);

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

    return redirect()->back()->with('success', 'Raport berhasil diupdate.');
  }

  public function updateBerkasTranskipNilaiPost(Request $request, $id)
  {
    $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

    if ($request->hasFile('transkip_nilai')) {
      // Hapus berkas lama jika ada
      $transkipNilaiLama = $berkasSiswa->transkip_nilai;
      if ($transkipNilaiLama) {
        Storage::delete($transkipNilaiLama);
      }

      $transkipNilaiName = $id . '-TranskipNilai.pdf';

      // Simpan berkas baru
      $request->file('transkip_nilai')->storeAS('siswa/transkip-nilai', $transkipNilaiName, 'public');
    }

    BerkasSiswa::where('nik', $id)->update([
      'transkip_nilai' => $transkipNilaiName,
    ]);

    CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Update']);

    return redirect()->back()->with('success', 'Transkip Nilai berhasil diupdate.');
  }


  public function cetakFormulir()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

    $user = CalonSiswa::where('nik', $nik)->first();
    $berkas = BerkasSiswa::where('nik', $nik)->first();
    $penilaian = PenilaianModel::where('nik', $nik)->first();

    CalonSiswa::where('nik', $nik)->update(['notifikasi_admin' => 'Siap Ujian']);

    $data = [
      'title' => 'Pratinjau Formulir ' . $user->nama,
      'penilaian' => $penilaian,
      'berkas' => $berkas,
      'user'  => $user,
    ];

    // Generate PDF content
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($options);
    $html = view('siswa.cetak-formulir.siswa-cetak-formulir', $data)->render();

    // Load HTML content
    $dompdf->loadHtml($html);

    // Render PDF (optional: set Paper size and orientation)
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Get PDF content
    $pdfContent = $dompdf->output();

    // Create response with PDF content for download
    $response = new Response($pdfContent);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'attachment; filename="formulir_' . $user->nama . '.pdf"');

    return $response;
  }


  public function pengaturanAkun()
  {
    $user = Auth::guard('siswa')->user();
    $nik = $user->nik;

    $user = CalonSiswa::where('nik', $nik)->first();
    $berkas = BerkasSiswa::where('nik', $nik)->first();

    $data = [
      'user'   => $user,
      'title' => 'Pengaturan Akun ' . $user->nama,
      'berkas' => $berkas,
    ];

    return view('siswa/pengaturan-akun/siswa-pengaturan-akun', $data, ['user' => $user]);
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
    $password = Hash::make($request->password);
    CalonSiswa::where('nik', $nik)->update([
      'password' => $password,
    ]);
    return redirect()->back()->with('success', 'Password berhasil diubah.');
  }

  public function logout()
  {
    Auth::guard('siswa')->logout();
    return redirect('/');
  }
}
