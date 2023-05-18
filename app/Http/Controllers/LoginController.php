<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ],[
            'email.required' => 'Kolom tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Kolom tidak boleh kosong!'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Selamat datang '. auth()->user()->name);
        }

        return back()->with('loginError', 'Email / Password salah!');
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil keluar');
    }
}
