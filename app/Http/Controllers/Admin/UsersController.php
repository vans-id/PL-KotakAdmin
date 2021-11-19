<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index', [
            "title" => "Pengguna",
            "users" => User::whereRoleIs(['user', 'owner'])->get()
        ]);
    }

    public function create()
    {
        return view('admin.users.add', [
            "title" => "Pengguna",
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email:dns|unique:users',
            'password' => 'required|max:255|min:6',
            'alamat' => 'required|max:255|min:6',
            'no_hp' => 'required|max:255|min:6',
            'role' => 'required|min:3',
            'rekening' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->attachRole($request->role);

        return redirect('/admin/users')->with("message", "Pengguna baru berhasil ditambahkan");
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/users')->with("message", "Berhasil menghapus pengguna");
    }
}
