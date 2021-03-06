<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin');
            } else {
                Auth::logout();
            }
        }

        return back()->with('loginError', 'User dan/atau password tidak terdaftar sebagai admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
