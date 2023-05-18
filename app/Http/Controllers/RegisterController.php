<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8|max:10',
            'konfirmasi_password' => 'required|same:password'
        ],[
            'name.required' => 'Kolom tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'email.required' => 'Kolom tidak boleh kosong!',
            'password.required' => 'Kolom tidak boleh kosong!',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter!',
            'password.max' => 'Password tidak boleh lebih dari 10 karakter!',
            'konfirmasi_password.required' => 'Kolom tidak boleh kosong!',
            'konfirmasi_password.same' => 'Konfirmasi password tidak cocok!'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $validate['level'] = 1;
        $validate['aktif'] = 1;
        $validate['kode_user'] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,20);

        User::create($validate);
        return redirect('/')->with('success', 'Registrasi akun berhasil, tunggu admin mengaktikan akun anda.');
    }
}
