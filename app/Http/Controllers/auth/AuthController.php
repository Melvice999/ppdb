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

        if (Auth::guard('siswa')->check()) {
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
            return back()->with('error', 'Nik tidak valid');
        }
        
        // Verifikasi password
        if (Hash::check($request->password, $user->password)) {
            // Login pengguna menggunakan nik sebagai ID
            Auth::guard('siswa')->login($user); // Menggunakan nik sebagai ID
            return redirect('siswa/profil');
        } else {
            return back()->with('error', 'Password salah');
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            // dd('berhasil');

            return redirect()->to(url('admin/admin-beranda'));
        } else {
            $emailExists = Auth::getProvider()->retrieveByCredentials(['email' => $request->email]);

            if ($emailExists && !Auth::validate(['email' => $request->email, 'password' => $request->password])) {
                return back()
                    ->with('error', 'Password salah');
            } else {
                return back()
                    ->with('error', 'Kombinasi email & password tidak valid');
            }
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('headmaster')->attempt($credentials)) {
            $request->session()->regenerate();
            // dd('berhasil');

            return redirect()->to(url('headmaster/headmaster-beranda'));
        } else {
            $emailExists = Auth::getProvider()->retrieveByCredentials(['email' => $request->email]);

            if ($emailExists && !Auth::validate(['email' => $request->email, 'password' => $request->password])) {
                return back()
                    ->with('error', 'Password salah');
            } else {
                return back()
                    ->with('error', 'Kombinasi email & password tidak valid');
            }
        }
    }
}
