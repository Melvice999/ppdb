<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\SiswaController;
use App\Models\CalonSiswa;
use PhpParser\Node\Stmt\GroupUse;

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
Route::group(['prefix' => '/'], function () {
    Route::get('/', [CalonSiswaController::class, 'index'])->name('/');
    Route::get('daftar', [CalonSiswaController::class, 'daftar'])->name('daftar');
    Route::get('hasil-seleksi', [CalonSiswaController::class, 'hasilSeleksi'])->name('hasil-seleksi');
    Route::get('informasi-pendaftaran', [CalonSiswaController::class, 'informasi'])->name('informasi-pendaftaran');
    // Daftar Formulir Calon Siswa
    Route::post('calon-siswa/store', [CalonSiswaController::class, 'store'])->name('calon-siswa.store');
    // Registrasi Akun Siswa
    Route::get('registrasi-siswa/index', [RegisterController::class, 'index'])->name('registrasi-siswa.index');
    Route::post('registrasi-akun/create', [RegisterController::class, 'register'])->name('registrasi-akun.create');
});

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('siswa-index', [AuthController::class, 'index'])->name('auth-siswa-index');
    Route::post('siswa-login', [AuthController::class, 'login'])->name('auth-siswa-login');
    Route::get('admin-index', [AuthController::class, 'indexAdmin'])->name('auth-admin-index');
    Route::post('admin-login', [AuthController::class, 'loginAdmin'])->name('auth-admin-login');
    Route::get('headmaster-index', [AuthController::class, 'indexHeadmaster'])->name('auth-headmaster-index');
    Route::post('headmaster-login', [AuthController::class, 'loginHeadmaster'])->name('auth-headmaster-login');
});

// Siswa
Route::get('siswa-beranda/{id?}', [SiswaController::class, 'index'])->name('siswa-beranda.{id?}');

// Admin
Route::group(['prefix' => 'admin-beranda'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-beranda');

    // View by prodi
    Route::get('tkro', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkro');
    Route::get('tbsm', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tbsm');
    Route::get('tkj', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkj');
    Route::get('akl', [AdminController::class, 'berandaProdi'])->name('admin-beranda-akl');

    // View by verify
    Route::get('sudah-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-sudah-tervalidasi');
    Route::get('belum-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-belum-tervalidasi');

    // Action
    Route::get('siswa-edit/{id?}', [AdminController::class, 'berandaSiswaEdit'])->name('admin-beranda-siswa-edit');
    Route::post('siswa-edit/{id?}', [AdminController::class, 'postBerandaSiswaEdit'])->name('admin-beranda-siswa-edit');
    Route::post('siswa-verifikasi/{id?}', [AdminController::class, 'berandaSiswavertifikasi'])->name('admin-beranda-siswa-verifikasi');
    Route::post('siswa-unverifikasi/{id?}', [AdminController::class, 'berandaSiswaUnvertifikasi'])->name('admin-beranda-siswa-unverifikasi');
    Route::get('siswa-delete/{id?}', [AdminController::class, 'berandaSiswaDelete'])->name('admin-beranda-siswa-delete');
});

// Admin-Pengaturan
Route::group(['prefix' => 'admin-pengaturan'], function () {
    Route::get('/', [AdminController::class, 'pengaturan'])->name('admin-pengaturan');
    Route::post('update/{id}', [AdminController::class, 'pengaturanUpdate'])->name('admin-pengaturan-update');

    // Beranda
    Route::get('beranda', [AdminController::class, 'pengaturanBeranda'])->name('admin-pengaturan-beranda');
    Route::get('tambah-beranda', [AdminController::class, 'pengaturanTambahBeranda'])->name('admin-pengaturan-tambah-beranda');
    Route::post('create-beranda', [AdminController::class, 'pengaturanCreateBeranda'])->name('admin-pengaturan-create-beranda');
    Route::get('update-beranda/{id?}', [AdminController::class, 'pengaturanUpdateBeranda'])->name('admin-pengaturan-update-beranda');
    Route::post('update-beranda/{id?}', [AdminController::class, 'postPengaturanUpdateBeranda'])->name('admin-pengaturan-update-beranda');
    Route::post('update-status-true-beranda/{id?}', [AdminController::class, 'postPengaturanUpdateStatusTrueBeranda'])->name('admin-pengaturan-update-status-true-beranda');
    Route::post('update-status-false-beranda/{id?}', [AdminController::class, 'postPengaturanUpdateStatusFalseBeranda'])->name('admin-pengaturan-update-status-false-beranda');
    Route::get('hapus-beranda/{id?}', [AdminController::class, 'pengaturanHapusBeranda'])->name('admin-pengaturan-hapus-beranda');

    // Kontak
    Route::get('kontak', [AdminController::class, 'pengaturanKontak'])->name('admin-pengaturan-kontak');
    Route::post('update-kontak/{id?}', [AdminController::class, 'postPengaturanKontak'])->name('admin-pengaturan-update-kontak');

    // Informasi
    Route::get('informasi', [AdminController::class, 'pengaturanInformasi'])->name('admin-pengaturan-informasi');
});

Route::get('admin-pusat-akun', [AdminController::class, 'pusatAkun'])->name('admin-pusat-akun');

Route::get('admin-penelusuran', [AdminController::class, 'penelusuran'])->name('admin-penelusuran');
