<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN PAGE
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $user = Account::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        session(['user' => $user]);

        return $user->role === 'admin'
            ? redirect('/admin')
            : redirect('/siswa/rooms');
    }

    // REGISTER PAGE
    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $req->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:accounts,email',
            'password' => 'required|min:4',
        ]);

        Account::create([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => Hash::make($req->password),
            'role'     => 'student', // default
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat.');
    }

    // LOGOUT
    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}
