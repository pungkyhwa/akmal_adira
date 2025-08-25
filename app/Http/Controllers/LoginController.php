<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => ['required'],
        ]);

        $credentials = $request->only(['name', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->withErrors(['login_error' => 'Username atau Password yang anda masukkan salah!']);

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.index');
    }
}
