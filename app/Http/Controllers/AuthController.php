<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLogin()
    {
        // cek jika sudah login, lempar ke index
        if (session()->has('user')) return redirect()->route('home');
        return view('login');
    }

    public function login(Request $request)
    {
        $valid_user ="admin";
        $valid_pass = "123";

        if ($request->username == $valid_user && $request->password == $valid_pass)
{
            // set session  laravel
            session(['user' => $request->username]);
            return redirect()->route('home');
        }

        // jika gagal , kembalikan  ke login dengan pesan error 
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->forget('user');// hapus session
        return redirect()->route('home');
    }
}

