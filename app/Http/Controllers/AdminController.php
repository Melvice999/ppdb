<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PengaturanModel;
use App\Models\BerandaModel;

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
            'title'             => 'halo',
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
    public function pengaturan()
    {
        $pengaturan         = PengaturanModel::get();
        $data = [
            'pengaturan'        => $pengaturan,
            'title'             => 'Manajemen Data Siswa PPDB SMK',
        ];

        return view('admin.admin-pengaturan', $data);
    }
    public function pengaturanBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Manajemen Data Siswa PPDB SMK',
        ];
        return view('admin.pengaturan.beranda.edit-beranda', $data);
    }
    public function pengaturanTambahBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Manajemen Data Siswa PPDB SMK',
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
            'title'     => 'Manajemen Data Siswa PPDB SMK',
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
        $data = [
            'pengaturan'    => $pengaturan,
            'title'         => 'Manajemen Data Siswa PPDB SMK',
        ];
        return view('admin.pengaturan.kontak.edit-kontak', $data);
    }
    public function pengaturanInformasi()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi')->first();
        $data = [
            'informasi'    => $informasi,
            'title'         => 'Manajemen Data Siswa PPDB SMK',
        ];
        return view('admin.pengaturan.informasi.edit-informasi', $data);
    }
}
