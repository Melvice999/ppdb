<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            "tbsm" => CalonSiswa::where('prodi', 'tbsm')->where('tahun_daftar', now()->year)->count(),
            "tkro" => CalonSiswa::where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count(),
            "tkj" => CalonSiswa::where('prodi', 'tkj')->where('tahun_daftar', now()->year)->count(),
            "akl" => CalonSiswa::where('prodi', 'akl')->where('tahun_daftar', now()->year)->count(),
            "status0" => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year)->count(),
            "status1" => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year)->count(),
            "title" => "Beranda Admin",
        ];

        return view('admin.admin-beranda', $data);
    }
    public function tbsm()
    {
        $data = [
            "status0" => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year),
            "status1" => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year),
            "title" => "Beranda Admin",
        ];
        return view('admin.beranda.tbsm', $data);
    }
    public function tkro()
    {
        $calonSiswa = CalonSiswa::where('prodi', 'tkro')
            ->where('tahun_daftar', now()->year)
            ->get();
        $data = [
            "statusc0" => CalonSiswa::where('status', 0)->where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count(),
            "statusc1" => CalonSiswa::where('status', 1)->where('prodi', 'tkro')->where('tahun_daftar', now()->year)->count(),
            "status0" => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year),
            "status1" => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year),
            "title" => "Beranda Admin",
        ];
        return view('admin.beranda.tkro', $data, compact('calonSiswa'));
    }
    public function tkj()
    {
        $data = [
            "status0" => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year),
            "status1" => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year),
            "title" => "Beranda Admin",
        ];
        return view('admin.beranda.tkj', $data);
    }
    public function akl()
    {
        $data = [
            "status0" => CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year),
            "status1" => CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year),
            "title" => "Beranda Admin",
        ];
        return view('admin.beranda.akl', $data);
    }
    public function belumTervalidasi()
    {
        $calonSiswa = CalonSiswa::where('status', 0)
            ->where('tahun_daftar', now()->year)
            ->get();

        $data = [
            "title" => "Beranda Admin",
        ];

        return view('admin.beranda.belum-tervalidasi', $data, compact('calonSiswa'));
    }
    public function tervalidasi()
    {
        $calonSiswa = CalonSiswa::where('status', 1)
            ->where('tahun_daftar', now()->year)
            ->get();

        $data = [
            "title" => "Beranda Admin",
        ];

        return view('admin.beranda.tervalidasi', $data, compact('calonSiswa'));
    }
    public function dataSiswa()
    {
        $data = [
            "title" => "Manajemen Data Siswa PPDB SMK",
        ];

        // return view('admin.admin-beranda', $data);
    }
    public function editInformasi()
    {
        $data = [
            "title" => "Edit Informasi PPDB SMK",

        ];

        // return view('admin.admin-beranda', $data);
    }
}
