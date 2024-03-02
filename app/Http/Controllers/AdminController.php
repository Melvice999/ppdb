<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PengaturanModel;
use App\Models\BerandaModel;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function index()
    {
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
            'title'     => 'halo',
            'status0'   => $status0,
            'status1'   => $status1,
        ];
        return view('admin.beranda.validate', ['programStudy' => $programStudy], $data);
    }

    public function berandaSiswaEdit($id)
    {
        $siswa = CalonSiswa::where('nik', $id)->first();
        $data = [
            'siswa'     => $siswa,
            'title'     => 'Beranda Admin',
        ];
        return view('admin.beranda.siswa-edit', $data);
    }

    public function postBerandaSiswaEdit(Request $request, $id = null)
    {
        CalonSiswa::where('nik', $id)->update([
            'nik' => $request->nik,
            'kk'    => $request->kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'provinsi' => $request->provinsi,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warga_negara' => $request->warga_negara,
            'kode_pos' => $request->kode_pos,
            'prodi' => $request->prodi,
            'batik' => $request->batik,
            'olahraga' => $request->olahraga,
            'wearpack' => $request->wearpack,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp_wali' => $request->no_hp_wali,
            'desa_wali' => $request->desa_wali,
            'rt_wali' => $request->rt_wali,
            'rw_wali' => $request->rw_wali,
            'provinsi_wali' => $request->provinsi_wali,
            'kecamatan_wali' => $request->kecamatan_wali,
            'kabupaten_wali' => $request->kabupaten_wali,
            'kode_pos_wali' => $request->kode_pos_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'info_sekolah' => $request->info_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function berandaSiswaUnvertifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        $siswa = CalonSiswa::where('nik', $id);
        $nama = $siswa->where('nik', $id)->first();

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

        $siswa->update(['status' => 1]);
        return redirect()->back()->with('success', 'Status ' . $nama->nama . ' berhasil diperbarui');
    }

    public function berandaSiswaDelete($id)
    {
        CalonSiswa::where('nik', $id)
            ->delete();
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
        $pengaturan    = PengaturanModel::get();

        PengaturanModel::where('id', $id)
            ->update([
                'wa'     => $request->wa,
                'ig'     => $request->ig,
                'fb'     => $request->fb,
                'yt'     => $request->yt,
                'web'    => $request->web,
                'map'    => $request->map,
            ]);

        $data = [
            'pengaturan'    => $pengaturan,
            'title'         => 'Pengaturan Admin',
        ];
        return redirect()->back()->with('success', 'Kontak berhasil diupdate!');
    }

    public function pengaturanInformasi()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi')->first();
        $data = [
            'informasi'    => $informasi,
            'title'         => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.informasi.edit-informasi', $data);
    }

    public function pusatAkun()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi')->first();
        $pengaturan    = PengaturanModel::get();
        $data = [
            'informasi'     => $informasi,
            'pengaturan'    => $pengaturan,
            'title'         => 'Pusat Akun',
        ];
        return view('admin.admin-pusat-akun', $data);
    }

    public function penelusuran(Request $request)
    {
        $keyword = $request->input('search');
        $calonSiswa = CalonSiswa::search($keyword)->orderBy('status', 'desc')->get();

        $data = [
            'hasil' => $request->search,
            'title' => 'Hasil Penelusuran'
        ];
        return view('admin.admin-penelusuran', $data,  compact('calonSiswa'))->with('success', '');
    }
}
