<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\SiswaController;
use App\Models\CalonSiswa;

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
    // Login siswa
    Route::get('auth-siswa/index', [AuthController::class, 'index'])->name('auth-siswa.index');
    Route::post('auth-siswa/login', [AuthController::class, 'login'])->name('auth-siswa.login');
});


// Siswa
Route::get('siswa-beranda/{id?}', [SiswaController::class, 'index'])->name('siswa-beranda.{id?}');

// Admin
Route::group(['prefix' => 'admin-beranda'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-beranda');
    Route::get('tkro', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkro');
    Route::get('tbsm', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tbsm');
    Route::get('tkj', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkj');
    Route::get('akl', [AdminController::class, 'berandaProdi'])->name('admin-beranda-akl');
    Route::get('sudah-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-sudah-tervalidasi');
    Route::get('belum-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-belum-tervalidasi');
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
    // Kontak
    Route::get('kontak', [AdminController::class, 'pengaturanKontak'])->name('admin-pengaturan-kontak');
    // Informasi
    Route::get('informasi', [AdminController::class, 'pengaturanInformasi'])->name('admin-pengaturan-informasi');
});

