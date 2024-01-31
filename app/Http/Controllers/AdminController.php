<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PengaturanModel;
use App\Models\MultiPengaturanModel;

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

    public function dataAkunSiswa()
    {
        $calonSiswa = CalonSiswa::where('status', 1)->get();
        $data = [
            'calonSiswa'    => $calonSiswa,
            'title'         => 'Data Calon Siswa',
        ];
        return view('admin.admin-akun-siswa', $data);
    }

    public function pengaturan()
    {
        $pengaturan         = PengaturanModel::get();
        $multiPengaturan    = MultiPengaturanModel::get();
        $data = [
            'Pengaturan'        => $pengaturan,
            'multiPengaturan'   => $multiPengaturan,
            'title'             => 'Manajemen Data Siswa PPDB SMK',
        ];

        return view('admin.admin-pengaturan', $data);
    }
    // public function pengaturanUpdate($id)
    // {
    //     $pengaturan = pengaturanModel::find($id);
    //     $pengaturan->status = ($pengaturan->status == 0) ? 1 : 0;
    //     $pengaturan->save();
    //     return redirect()->back();
    // }
    public function editInformasi()
    {
        $data = [
            'title' => 'Edit Informasi PPDB SMK',

        ];

        // return view('admin.admin-beranda', $data);
    }
}
