<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginSiswa(Request $request)
    {

        if (Auth::guard('calon_siswa')->check()) {
            return redirect('siswa/profil');
        } else {
            $auth   = $request->route()->getName();
            $data = [
                'title'             => 'Login Siswa',
            ];
            return view('auth/login', $data, ['auth' => $auth]);
        }
    }

    public function postLoginSiswa(Request $request)
    {
        $user = \App\Models\CalonSiswa::where('nik', $request->nik)->first();

        if (!$user) {
            return back()->with('error', 'NIK tidak valid');
        }

        // Verifikasi password
        if (Hash::check($request->password, $user->password)) {
            // Login pengguna menggunakan nik sebagai ID
            Auth::guard('calon_siswa')->login($user);
            return redirect('siswa/profil');
        } else {
            return back()->with('error', 'Password tidak valid');
        }
    }

    public function loginAdmin(Request $request)
    {

        if (Auth::guard('admin')->check()) {
            return redirect('admin/admin-beranda');
        } else {
            $auth   = $request->route()->getName();
            $data = [
                'title'             => 'Beranda Admin',
            ];
            return view('auth/login', $data, ['auth' => $auth]);
        }
    }

    public function postLoginAdmin(Request $request)
    {
        $user = \App\Models\AdminModel::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak valid');
        }

        // Verifikasi password
        if (Hash::check($request->password, $user->password)) {

            Auth::guard('admin')->login($user);
            return redirect()->to(url('admin/admin-beranda'));
        } else {
            return back()->with('error', 'Password tidak valid');
        }
    }

    public function loginHeadmaster(Request $request)
    {

        if (Auth::guard('headmaster')->check()) {
            return redirect('headmaster/headmaster-beranda');
        } else {
            $auth   = $request->route()->getName();
            $data = [
                'title'             => 'Beranda Admin',
            ];
            return view('auth/login', $data, ['auth' => $auth]);
        }
    }

    public function postLoginHeadmaster(Request $request)
    {
        $user = \App\Models\HeadmasterModel::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak valid');
        }

        // Verifikasi password
        if (Hash::check($request->password, $user->password)) {

            Auth::guard('headmaster')->login($user);
            return redirect()->to(url('headmaster/headmaster-beranda'));
        } else {
            return back()->with('error', 'Password tidak valid');
        }
    }
}
