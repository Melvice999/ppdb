<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AkunSiswa;
use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PengaturanModel;
use App\Models\BerandaModel;
use App\Models\BerkasSiswa;
use App\Models\NotifikasiAdminModel;
use App\Models\NotifikasiModel;
use App\Models\PenilaianModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // jika ingin menambahkan tahun tinggal tambahkan addYear()-> untuk 1x tahunnya
        // 'tkj'       => CalonSiswa::where('prodi', 'tkj')->where('tahun_daftar',  now()->addYear()->year)->count(),
        $data = [
            'tbsm'      => CalonSiswa::where('prodi', 'tbsm')->where('tahun_daftar', now()->year)->count(),
            'tkro'      => CalonSiswa::where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count(),
            'tkj'       => CalonSiswa::where('prodi', 'tkj')->where('tahun_daftar', now()->year)->count(),
            'akl'       => CalonSiswa::where('prodi', 'akl')->where('tahun_daftar', now()->year)->count(),
            'status0'   => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year)->count(),
            'status1'   => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year)->count(),
            'title'     => 'Beranda Admin',
        ];

        return view('admin.admin-beranda', $data);
    }

    public function berandaProdi(Request $request)
    {
        $programStudy   = $request->route()->getName();
        $calonSiswaTbsm = CalonSiswa::where('prodi', 'tbsm')->where('tahun_daftar', now()->year)->get();
        $calonSiswaTkro = CalonSiswa::where('prodi', 'tkro')->where('tahun_daftar', now()->year)->get();
        $calonSiswaTkj  = CalonSiswa::where('prodi', 'tkj')->where('tahun_daftar', now()->year)->get();
        $calonSiswaAkl  = CalonSiswa::where('prodi', 'akl')->where('tahun_daftar', now()->year)->get();
        $statusTbsm0    = CalonSiswa::where('status', 0)->where('prodi', 'tbsm')->where('tahun_daftar', now()->year)->count();
        $statusTbsm1    = CalonSiswa::where('status', 1)->where('prodi', 'tbsm')->where('tahun_daftar', now()->year)->count();
        $statusTkro0    = CalonSiswa::where('status', 0)->where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count();
        $statusTkro1    = CalonSiswa::where('status', 1)->where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count();
        $statusTkj0     = CalonSiswa::where('status', 0)->where('prodi', 'tkj')->where('tahun_daftar', now()->year)->count();
        $statusTkj1     = CalonSiswa::where('status', 1)->where('prodi', 'tkj')->where('tahun_daftar', now()->year)->count();
        $statusAkl0     = CalonSiswa::where('status', 0)->where('prodi', 'akl')->where('tahun_daftar', now()->year)->count();
        $statusAkl1     = CalonSiswa::where('status', 1)->where('prodi', 'akl')->where('tahun_daftar', now()->year)->count();
        $status0        = CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year);
        $status1        = CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year);

        $data = [
            'title'             => 'Beranda Admin',
            'calonSiswaTbsm'    => $calonSiswaTbsm,
            'calonSiswaTkro'    => $calonSiswaTkro,
            'calonSiswaTkj'     => $calonSiswaTkj,
            'calonSiswaAkl'     => $calonSiswaAkl,
            'statusTbsm0'       => $statusTbsm0,
            'statusTbsm1'       => $statusTbsm1,
            'statusTkro0'       => $statusTkro0,
            'statusTkro1'       => $statusTkro1,
            'statusTkj0'        => $statusTkj0,
            'statusTkj1'        => $statusTkj1,
            'statusAkl0'        => $statusAkl0,
            'statusAkl1'        => $statusAkl1,
            'status0'           => $status0,
            'status1'           => $status1,
        ];
        return view('admin.beranda.prodi', ['programStudy' => $programStudy], $data);
    }

    public function berandaValidate(Request $request)
    {
        $programStudy   = $request->route()->getName();
        $status0        = CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year)->get();
        $status1        = CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year)->get();


        $data = [
            'title'     => 'Beranda Admin',
            'status0'   => $status0,
            'status1'   => $status1,
        ];
        return view('admin.beranda.validate', ['programStudy' => $programStudy], $data);
    }

    public function berandaSiswaEdit($id)
    {
        $siswa = CalonSiswa::where('nik', $id)->first();
        $berkas = BerkasSiswa::where('nik', $id)->first();
        $penilaian = PenilaianModel::where('nik', $id)->first();
        $notifikasi = NotifikasiModel::where('nik', $id)->first();
        $data = [
            'penilaian'         => $penilaian,
            'notifikasi'        => $notifikasi,
            'siswa'             => $siswa,
            'berkas'            => $berkas,
            'title'             => 'Beranda Admin',
        ];
        return view('admin.beranda.siswa-edit', $data);
    }

    public function postBerandaSiswaEdit(Request $request, $id)
    {
        $request->validate([
            'nik'       => 'min:16',
        ], [
            'nik.min'       => 'Panjang NIK minimal 16 karakter',
        ]);

        $notifikasi = $request->notifikasi;
        NotifikasiModel::where('nik', $id)->update([
            'notifikasi' => $notifikasi,
        ]);

        PenilaianModel::where('nik', $id)->update([
            'btq'=>  $request->btq,
            'akademik'=>  $request->akademik,
            'berat_badan'=>  $request->berat_badan,
            'tinggi_badan'=>  $request->tinggi_badan,
            'tatto'=>  $request->tatto,
            'tindik'=>  $request->tindik,
            'tangan'=>  $request->tangan,
            'kaki'=>  $request->kaki,
            'riwayat_penyakit'=>  $request->riwayat_penyakit,
            'lainnya'=>  $request->lainnya,
        ]);

        if ($notifikasi === "Selamat anda lulus ujian pendaftaran") {
            CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Lulus Ujian', 'status' => 1]);
        } elseif ($notifikasi === "Pendaftaran sedang diproses") {
            CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Pendaftar Baru', 'status' => 0]);
        } elseif ($notifikasi === "Silahkan mengikuti ujian di SMK Maarif NU Doro dengan membawa formulir yang telah dicetak") {
            CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Siap Ujian']);
        }

        if ($request->reset_password !== null) {

            $request->validate([
                'reset_password'  => 'min:6'
              ], [
                'reset_password.min'          => 'Password minimal 6 karakter.',
              ]);

            $new_password = $request->reset_password;
            CalonSiswa::where('nik', $id)->update([
                'password' => Hash::make($new_password),
            ]);
        }

        CalonSiswa::where('nik', $id)->update([
            'nik' => $request->nik,
            'no_pendaftaran' => $request->no_pendaftaran,
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'provinsi' => $request->provinsi,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'prodi' => $request->prodi,
            'wearpack' => $request->wearpack,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp_wali' => $request->no_hp_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function berandaSiswaUnvertifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        // delete no pendaftaran


        $siswa = CalonSiswa::where('nik', $id);
        $nama = $siswa->where('nik', $id)->first();

        CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Pendaftar Baru']);
        NotifikasiModel::where('nik', $id)->update(['notifikasi' => 'Pendaftaran sedang diproses']);
        $siswa->update(['status' => 0]);

        return redirect()->back()->with('success', 'Status ' . $nama->nama . ' berhasil diperbarui');
    }

    public function berandaSiswaVertifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $siswa = CalonSiswa::where('nik', $id);
        $nama = $siswa->where('nik', $id)->first();

        NotifikasiModel::where('nik', $id)->update(['notifikasi' => 'Selamat anda lulus ujian pendaftaran']);
        CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Lulus Ujian']);


        $siswa->update(['status' => 1]);
        return redirect()->back()->with('success', 'Status ' . $nama->nama . ' berhasil diperbarui');
    }

    public function berandaSiswaDelete($id)
    {
        $berkasSiswa = BerkasSiswa::where('nik', $id)->first();

        // Periksa apakah data ada sebelum mencoba untuk menghapusnya
        if ($berkasSiswa) {
            if (Storage::exists('public/siswa/akta/' . $berkasSiswa->akta)) {
                Storage::delete('public/siswa/akta/' . $berkasSiswa->akta);
            }

            if (Storage::exists('public/siswa/kk/' . $berkasSiswa->kk)) {
                Storage::delete('public/siswa/kk/' . $berkasSiswa->kk);
            }

            if (Storage::exists('public/siswa/pas-foto/' . $berkasSiswa->pas_foto)) {
                Storage::delete('public/siswa/pas-foto/' . $berkasSiswa->pas_foto);
            }

            if (Storage::exists('public/siswa/shun/' . $berkasSiswa->shun)) {
                Storage::delete('public/siswa/shun/' . $berkasSiswa->shun);
            }

            if (Storage::exists('public/siswa/ijazah/' . $berkasSiswa->ijazah)) {
                Storage::delete('public/siswa/ijazah/' . $berkasSiswa->ijazah);
            }

            if (Storage::exists('public/siswa/raport/' . $berkasSiswa->raport)) {
                Storage::delete('public/siswa/raport/' . $berkasSiswa->raport);
            }

            if (Storage::exists('public/siswa/transkip-nilai/' . $berkasSiswa->transkip_nilai)) {
                Storage::delete('public/siswa/transkip-nilai/' . $berkasSiswa->transkip_nilai);
            }
        }

        BerkasSiswa::where('nik', $id)->delete();
        NotifikasiModel::where('nik', $id)->delete();
        PenilaianModel::where('nik', $id)->delete();
        CalonSiswa::where('nik', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function pengaturan()
    {
        $pengaturan         = PengaturanModel::get();
        $data = [
            'pengaturan'        => $pengaturan,
            'title'             => 'Pengaturan Admin',
        ];

        return view('admin.admin-pengaturan', $data);
    }

    public function pengaturanBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.edit-beranda', $data);
    }

    public function pengaturanTambahBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.tambah-beranda', $data);
    }

    public function pengaturanCreateBeranda(Request $request)
    {
        $request->validate([
            'judul'     => 'required|unique:beranda',
            'konten'    => 'required',
        ]);
        $beranda = new BerandaModel();
        $beranda->judul = $request->input('judul');
        $beranda->konten = $request->input('konten');
        $beranda->save();

        return redirect()->route('admin-pengaturan-beranda')->with('success', 'Beranda berhasil disimpan!');
    }

    public function pengaturanUpdateBeranda($id)
    {
        $beranda    = BerandaModel::find($id);
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.update-beranda', $data);
    }

    public function postPengaturanUpdateBeranda(Request $request, $id)
    {
        BerandaModel::where('id', $id)->update([
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);
        return redirect()->back()->with('success', 'Beranda berhasil diupdate!');
    }

    public function postPengaturanUpdateStatusFalseBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->update(['status' => 1]);
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Status ' . $j_beranda->judul . ' berhasil diperbarui');
    }

    public function postPengaturanUpdateStatusTrueBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->update(['status' => 0]);
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Status ' . $j_beranda->judul . ' berhasil diperbarui');
    }

    public function pengaturanHapusBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->delete();
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function pengaturanUpdate(Request $request, $id)
    {
        $pengaturan = PengaturanModel::findOrFail($id);
        $columnToUpdate = $request->input('update_column');
        $pengaturan->$columnToUpdate = !$pengaturan->$columnToUpdate;
        $pengaturan->save();
        return redirect()->back();
    }

    public function pengaturanKontak()
    {
        $pengaturan    = PengaturanModel::get();
        $id = PengaturanModel::first();
        $data = [
            'id'            => $id->id,
            'pengaturan'    => $pengaturan,
            'title'         => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.kontak.edit-kontak', $data);
    }

    public function postPengaturanKontak(Request $request, $id)
    {
        $input = $request->input('link_map');
        preg_match('/src="([^"]+)"/', $input, $matches);
        $url = $matches[1];

        $pengaturan    = PengaturanModel::get();

        PengaturanModel::where('id', $id)
            ->update([
                'wa'        => $request->wa,
                'ig'        => $request->ig,
                'fb'        => $request->fb,
                'yt'        => $request->yt,
                'web'       => $request->web,
                'map'       => $request->map,
                'link_map'  => $url,
            ]);

        $data = [
            'pengaturan'    => $pengaturan,
            'title'         => 'Pengaturan Admin',
        ];
        return redirect()->back()->with('success', 'Kontak berhasil diupdate!');
    }

    public function pengaturanInformasi()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi', 'id')->first();

        $data = [
            'informasi'    => $informasi,
            'title'         => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.informasi.edit-informasi', $data);
    }

    public function pengaturanInformasiPost(Request $request, $id)
    {
        $informasi    = PengaturanModel::where('id', $id)->first();

        $informasi->update([
            'j_informasi' => $request->j_informasi,
            'informasi' => $request->informasi
        ]);

        return redirect()->back()->with('success', 'Informasi berhasil diupdate!');
    }

    public function pusatAkun()
    {
        $admin  = Auth::guard('admin')->user();
        $email = $admin->email;
        $akun = AdminModel::where('email', $email)->first();

        $data = [
            'akun'      => $akun,
            'title'     => 'Pusat Akun',
        ];
        return view('admin.admin-pusat-akun', $data);
    }

    public function pusatAkunPost(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'nullable|confirmed|min:5',
        ], [
            'email.email'           => 'Harus diisi dengan email.',
            'email.ends_with'       => 'Email harus @gmail.com.',
            'password.confirmed'    => 'Password tidak cocok.',
            'password.min'          => 'Password minimal 5 karakter.',
        ]);

        $updateData = [];

        if ($request->filled('email')) {
            $updateData['email'] = $request->email;
            $pesan = 'Email';
        }

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
            $pesan = 'Password';
        }

        AdminModel::where('id', $id)->update($updateData);

        return redirect()->back()->with('success', $pesan . ' berhasil diubah');
    }

    public function penelusuran(Request $request)
    {
        $keyword = $request->input('search');
        $calonSiswa = CalonSiswa::admin($keyword)->orderBy('nama', 'asc')->get();

        $data = [
            'hasil' => $request->search,
            'title' => 'Hasil Penelusuran'
        ];
        return view('admin.admin-penelusuran', $data,  compact('calonSiswa'))->with('success', '');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('auth-admin');
    }
}
