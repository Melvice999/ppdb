<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\HeadmasterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Calon Siswa
Route::prefix('/')->group(function () {
    Route::get('/', [CalonSiswaController::class, 'index'])->name('/');
    Route::get('daftar', [CalonSiswaController::class, 'daftar'])->name('daftar');
    Route::get('hasil-seleksi', [CalonSiswaController::class, 'hasilSeleksi'])->name('hasil-seleksi');
    Route::get('informasi-pendaftaran', [CalonSiswaController::class, 'informasi'])->name('informasi-pendaftaran');
    // Daftar Formulir Calon Siswa
    Route::post('calon-siswa/store', [CalonSiswaController::class, 'store'])->name('calon-siswa.store');
    Route::get('daftar/otp/{nik?}/{no_hp?}', [CalonSiswaController::class, 'otp'])->name('daftar/otp');
    Route::post('daftar/otp-update-nohp/{nik?}/{no_hp?}', [CalonSiswaController::class, 'otpUpdateNohp'])->name('daftar/otp-update-nohp');
    Route::post('daftar/otp-request/{nik?}/{no_hp?}', [CalonSiswaController::class, 'otpRequest'])->name('daftar/otp-request');
    Route::post('daftar/otp-post', [CalonSiswaController::class, 'otpPost'])->name('daftar/otp-post');

    Route::get('daftar/detail-calon-siswa/{nik?}/{no_hp?}/{otp?}', [CalonSiswaController::class, 'detailCalonSiswa'])->name('daftar/detail-calon-siswa');
    Route::post('daftar/detail-calon-siswa-post', [CalonSiswaController::class, 'detailCalonSiswaPost'])->name('daftar/detail-calon-siswa-post');
    // Registrasi Akun Siswa
    // Route::get('registrasi-siswa/index', [RegisterController::class, 'index'])->name('registrasi-siswa.index');
    // Route::post('registrasi-akun/create', [RegisterController::class, 'register'])->name('registrasi-akun.create');
});

// Auth siswa
Route::prefix('auth-siswa')->group(function () {
    Route::get('/', [AuthController::class, 'loginSiswa'])->name('auth-siswa');
    Route::post('siswa-login', [AuthController::class, 'postLoginSiswa'])->name('auth-siswa-login');
});

// Auth admin
Route::prefix('auth-admin')->group(function () {
    Route::get('/', [AuthController::class, 'loginAdmin'])->name('auth-admin');
    Route::post('admin-login', [AuthController::class, 'postLoginAdmin'])->name('auth-admin-login');
});

// Auth headmaster
Route::prefix('auth-headmaster')->group(function () {
    Route::get('/', [AuthController::class, 'loginHeadmaster'])->name('auth-headmaster');
    Route::post('headmaster-login', [AuthController::class, 'postLoginHeadmaster'])->name('auth-headmaster-login');
});

// Siswa
Route::prefix('siswa')->middleware('auth-siswa')->group(function () {
    Route::get('profil/{id?}', [SiswaController::class, 'index'])->name('siswa-profil');
    Route::get('formulir-pendaftaran', [SiswaController::class, 'formulirPendaftaran'])->name('siswa-formulir-pendaftaran');
    Route::get('pengaturan', [SiswaController::class, 'pengaturan'])->name('siswa-pengaturan');

    Route::get('upload-berkas', [SiswaController::class, 'uploadBerkas'])->name('siswa-upload-berkas');
    Route::post('upload-berkas-post', [SiswaController::class, 'uploadBerkasPost'])->name('siswa-upload-berkas-post');

    Route::get('update-berkas', [SiswaController::class, 'updateBerkas'])->name('siswa-update-berkas');
    Route::post('update-berkas-post', [SiswaController::class, 'updateBerkasPost'])->name('siswa-update-berkas-post');

    // update berkas
    Route::post('update-berkas-akta-post/{id?}', [SiswaController::class, 'updateBerkasAktaPost'])->name('siswa-update-berkas-akta-post');
    Route::post('update-berkas-kk-post/{id?}', [SiswaController::class, 'updateBerkasKKPost'])->name('siswa-update-berkas-kk-post');
    Route::post('update-berkas-pas-foto-post/{id?}', [SiswaController::class, 'updateBerkasPasFotoPost'])->name('siswa-update-berkas-pas-foto-post');
    Route::post('update-berkas-shun-post/{id?}', [SiswaController::class, 'updateBerkasShunPost'])->name('siswa-update-berkas-shun-post');
    Route::post('update-berkas-ijazah-post/{id?}', [SiswaController::class, 'updateBerkasIjazahPost'])->name('siswa-update-berkas-ijazah-post');
    Route::post('update-berkas-raport-post/{id?}', [SiswaController::class, 'updateBerkasRaportPost'])->name('siswa-update-berkas-raport-post');
    Route::post('update-berkas-transkrip-nilai-post/{id?}', [SiswaController::class, 'updateBerkasTranskripNilaiPost'])->name('siswa-update-berkas-transkrip-nilai-post');

    Route::get('cetak-formulir', [SiswaController::class, 'cetakFormulir'])->name('siswa-cetak-formulir');

    Route::get('pengaturan-akun', [SiswaController::class, 'pengaturanAkun'])->name('siswa-pengaturan-akun');
    Route::post('pengaturan-password-post', [SiswaController::class, 'pengaturanPasswordPost'])->name('siswa-pengaturan-password-post');

    Route::get('logout', [SiswaController::class, 'logout'])->name('siswa-logout');
});

// Admin
Route::prefix('admin')->middleware('auth-admin')->group(function () {

    Route::get('admin-beranda', [AdminController::class, 'index'])->name('admin-beranda');

    // View by prodi
    Route::get('admin-beranda-tkro', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkro');
    Route::get('admin-beranda-tbsm', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tbsm');
    Route::get('admin-beranda-tkj', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkj');
    Route::get('admin-beranda-akl', [AdminController::class, 'berandaProdi'])->name('admin-beranda-akl');

    // View by verify
    Route::get('admin-beranda-sudah-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-sudah-tervalidasi');
    Route::get('admin-beranda-belum-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-belum-tervalidasi');

    // Action Edit
    Route::get('admin-beranda-siswa-edit/{id?}', [AdminController::class, 'berandaSiswaEdit'])->name('admin-beranda-siswa-edit');
    Route::post('admin-beranda-siswa-edit-post/{id?}', [AdminController::class, 'postBerandaSiswaEdit'])->name('admin-beranda-siswa-edit-post');
    Route::post('admin-beranda-siswa-verifikasi/{id?}', [AdminController::class, 'berandaSiswavertifikasi'])->name('admin-beranda-siswa-verifikasi');
    Route::post('admin-beranda-siswa-unverifikasi/{id?}', [AdminController::class, 'berandaSiswaUnvertifikasi'])->name('admin-beranda-siswa-unverifikasi');
    Route::get('admin-beranda-siswa-delete/{id?}', [AdminController::class, 'berandaSiswaDelete'])->name('admin-beranda-siswa-delete');

    // Admin-Pengaturan
    Route::get('admin-pengaturan', [AdminController::class, 'pengaturan'])->name('admin-pengaturan');
    Route::post('admin-pengaturan-update/{id}', [AdminController::class, 'pengaturanUpdate'])->name('admin-pengaturan-update');

    // Beranda
    Route::get('admin-pengaturan-beranda', [AdminController::class, 'pengaturanBeranda'])->name('admin-pengaturan-beranda');
    Route::get('admin-pengaturan-tambah-beranda', [AdminController::class, 'pengaturanTambahBeranda'])->name('admin-pengaturan-tambah-beranda');
    Route::post('admin-pengaturan-create-beranda', [AdminController::class, 'pengaturanCreateBeranda'])->name('admin-pengaturan-create-beranda');
    Route::get('admin-pengaturan-update-beranda/{id?}', [AdminController::class, 'pengaturanUpdateBeranda'])->name('admin-pengaturan-update-beranda');
    Route::post('admin-pengaturan-update-beranda-post/{id?}', [AdminController::class, 'postPengaturanUpdateBeranda'])->name('admin-pengaturan-update-beranda-post');
    Route::post('admin-pengaturan-update-status-true-beranda/{id?}', [AdminController::class, 'postPengaturanUpdateStatusTrueBeranda'])->name('admin-pengaturan-update-status-true-beranda');
    Route::post('admin-pengaturan-update-status-false-beranda/{id?}', [AdminController::class, 'postPengaturanUpdateStatusFalseBeranda'])->name('admin-pengaturan-update-status-false-beranda');
    Route::get('admin-pengaturan-hapus-beranda/{id?}', [AdminController::class, 'pengaturanHapusBeranda'])->name('admin-pengaturan-hapus-beranda');

    // Kontak
    Route::get('admin-pengaturan-kontak', [AdminController::class, 'pengaturanKontak'])->name('admin-pengaturan-kontak');
    Route::post('admin-pengaturan-update-kontak/{id?}', [AdminController::class, 'postPengaturanKontak'])->name('admin-pengaturan-update-kontak');

    // Informasi
    Route::get('admin-pengaturan-informasi', [AdminController::class, 'pengaturanInformasi'])->name('admin-pengaturan-informasi');
    Route::post('admin-pengaturan-informasi-post/{id?}', [AdminController::class, 'pengaturanInformasiPost'])->name('admin-pengaturan-informasi-post');

    // pusat akun
    Route::get('admin-pusat-akun', [AdminController::class, 'pusatAkun'])->name('admin-pusat-akun');
    Route::post('admin-pusat-akun-post', [AdminController::class, 'pusatAkunPost'])->name('admin-pusat-akun-post');

    // search
    Route::get('admin-penelusuran', [AdminController::class, 'penelusuran'])->name('admin-penelusuran');

    // logout
    Route::get('logout', [AdminController::class, 'logout'])->name('admin-logout');
});

Route::prefix('headmaster')->middleware('auth-headmaster')->group(function () {
    Route::get('headmaster-beranda', [HeadmasterController::class, 'index'])->name('headmaster-beranda');
    Route::get('headmaster-formulir-tahun', [HeadmasterController::class, 'formulirTahun'])->name('headmaster-formulir-tahun');
    Route::get('headmaster-rekap-ppdb', [HeadmasterController::class, 'rekapPpdb'])->name('headmaster-rekap-ppdb');

    // tahun daftar
    Route::get('headmaster-cetak-formulir-tahun/{id?}', [HeadmasterController::class, 'cetakFormulirTahun'])->name('headmaster-cetak-formulir-tahun');

    // formulir
    Route::get('headmaster-cetak-formulir-siswa/{id?}', [HeadmasterController::class, 'cetakFormulirSiswa'])->name('headmaster-cetak-formulir-siswa');
    Route::post('headmaster-cetak-formulir-siswa-post/{id?}', [HeadmasterController::class, 'cetakFormulirSiswaPost'])->name('headmaster-cetak-formulir-siswa-post');

    // rekap
    Route::get('headmaster-cetak-rekap-tahun/{id?}', [HeadmasterController::class, 'cetakRekapTahun'])->name('headmaster-cetak-rekap-tahun');
    Route::post('headmaster-cetak-rekap-tahun-post/{id?}', [HeadmasterController::class, 'cetakRekapTahunPost'])->name('headmaster-cetak-rekap-tahun-post');


    // pusat akun
    Route::get('headmaster-pusat-akun', [HeadmasterController::class, 'pusatAkun'])->name('headmaster-pusat-akun');
    Route::post('headmaster-pusat-akun-post', [HeadmasterController::class, 'pusatAkunPost'])->name('headmaster-pusat-akun-post');

    // search
    Route::get('headmaster-penelusuran', [HeadmasterController::class, 'penelusuran'])->name('headmaster-penelusuran');

    // logout
    Route::get('logout', [HeadmasterController::class, 'logout'])->name('headmaster-logout');
});
