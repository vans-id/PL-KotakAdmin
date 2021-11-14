<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index', [
            "title" => "Kosntrak",
            "users" => User::all()
        ]);
    }

    public function create()
    {
        return view('admin.users.add', [
            "title" => "Kosntrak",
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email:dns|unique:users',
            'password' => 'required|max:255|min:6',
            'address' => 'required|max:255|min:6',
            'phone' => 'required|max:255|min:6',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

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
