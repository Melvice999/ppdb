<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function loginSiswa(Request $request)
    {

        if (Auth::check()) {
            return redirect('siswa/profil');
        } else {
            $auth   = $request->route()->getName();
            $data = [
                'title'             => 'Beranda Admin',
            ];
            return view('auth/login', $data, ['auth' => $auth]);
        }
    }

    public function postLoginSiswa(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->to(url('siswa/profil'));
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

        if (Auth::check()) {
            return redirect('headmaster-beranda');
        } else {
            $auth   = $request->route()->getName();
            $data = [
                'title'             => 'Beranda Admin',
            ];
            return view('auth/login', $data, ['auth' => $auth]);
        }
    }
}
