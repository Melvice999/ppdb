<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkunSiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login-siswa');
    }
    public function login(Request $request)
    {
       $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return 'berhasil';
            // return redirect()->route('dashboard')
            //     ->withSuccess('You have successfully logged in!');
        }else {
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
