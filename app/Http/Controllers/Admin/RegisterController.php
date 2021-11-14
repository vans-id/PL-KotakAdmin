<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email:dns|unique:admins',
            'password' => 'required|max:255|min:6',
        ]);

        $data['password'] = bcrypt($data['password']);

        Admin::create($data);

        return redirect('/admin/login')->with("message", "Akun berhasil dibuat");
    }
}
