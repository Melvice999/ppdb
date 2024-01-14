<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;


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
Route::get('/', function () {
    return view('guest/beranda');
});
Route::get('/daftar', function () {
    return view('guest/daftar');
});
Route::get('/informasi-pendaftar', function () {
    return view('guest/informasi-pendaftar');
});
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
// Admin
Route::get('/admin/beranda', function () {
    return view('admin/beranda');
});

