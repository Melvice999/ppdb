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
Route::get(
    '/',
    [CalonSiswaController::class, 'index']
)->name('/');

Route::get(
    'daftar',
    [CalonSiswaController::class, 'daftar']
)->name('daftar');

Route::get(
    'informasi-pendaftaran',
    [CalonSiswaController::class, 'informasi']
)->name('informasi-pendaftaran');

// Daftar Formulir Calon Siswa
Route::post(
    '/calon-siswa/store',
    [CalonSiswaController::class, 'store']
)
    ->name('calon-siswa.store');

// Registrasi Akun Siswa
Route::get(
    '/registrasi-siswa/index',
    [RegisterController::class, 'index']
)
    ->name('registrasi-siswa.index');
Route::post(
    '/registrasi-akun/create',
    [RegisterController::class, 'register']
)
    ->name('registrasi-akun.create');

// Login siswa
Route::get(
    '/auth-siswa/index',
    [AuthController::class, 'index']
)
    ->name('auth-siswa.index');
Route::post(
    '/auth-siswa/login',
    [AuthController::class, 'login']
)
    ->name('auth-siswa.login');

// Siswa
Route::get(
    'siswa-beranda/{id?}',
    [SiswaController::class, 'index']
)
    ->name('siswa-beranda.{id?}');

// Admin
Route::get(
    'admin-beranda',
    [AdminController::class, 'index']
)
    ->name('admin-beranda');



Route::group(['prefix' => 'admin-beranda'], function () {
    Route::get('tkro', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkro');
    Route::get('tbsm', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tbsm');
    Route::get('tkj', [AdminController::class, 'berandaProdi'])->name('admin-beranda-tkj');
    Route::get('akl', [AdminController::class, 'berandaProdi'])->name('admin-beranda-akl');
    Route::get('sudah-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-sudah-tervalidasi');
    Route::get('belum-tervalidasi', [AdminController::class, 'berandaValidate'])->name('admin-beranda-belum-tervalidasi');
});
Route::get(
    'admin-akun-siswa',
    [AdminController::class, 'dataAkunSiswa']
)
->name('admin-akun-siswa');

Route::get(
    'admin-pengaturan',
    [AdminController::class, 'pengaturan']
)
    ->name('admin-pengaturan');

// Route::post('admin-pengaturan-update/{id}', [AdminController::class, 'pengaturanUpdate'])->name('admin-pengaturan-update');
