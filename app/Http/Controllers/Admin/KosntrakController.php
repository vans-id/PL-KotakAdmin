<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Kosntrak;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KosntrakController extends Controller
{

    public function index()
    {
        $kosntraks = Kosntrak::with(['user'])->get();

        return view('admin.kosntrak.index', [
            "title" => "Kosntrak",
            "kosntraks" => $kosntraks
        ]);
    }

    public function create()
    {
        return view('admin.kosntrak.add', ["title" => "Tambah Kosntrak"]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => 'required',
            'type' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'maps' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|min:3|max:255',
            'image' => 'image|file|max:4096',
            'bedroom' => 'required|min:3|max:255',
            'bathroom' => 'required|min:3|max:255',
        ]);

        $owner = User::where('id', $request->owner_id);
        if ($owner->hasRole(['user', 'admin'])) {
            redirect('/admin/kosntrak/create')->with("message", "User tidak terdaftar sebagai pemilik");
        }

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('kosntrak-images');
        }

        Kosntrak::create($data);

        return redirect('/admin/kosntrak')->with("message", "Kos/Kontrakan berhasil ditambahkan");
    }

    public function show(Kosntrak $kosntrak)
    {
        //
    }

    public function edit(Kosntrak $kosntrak)
    {
        return view('admin.kosntrak.edit', [
            "title" => "Edit Kosntrak",
            "kosntrak" => $kosntrak
        ]);
    }

    public function update(Request $request, Kosntrak $kosntrak)
    {
        $data = $request->validate([
            'owner_id' => 'required',
            'type' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'maps' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|min:3|max:255',
            'image' => 'image|file|max:4096',
            'bedroom' => 'required|min:3|max:255',
            'bathroom' => 'required|min:3|max:255',
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('kosntrak-images');
        }

        Kosntrak::where('id', $kosntrak->id)
            ->update($data);
        return redirect('/admin/kosntrak')->with("message", "Kos/Kontrakan berhasil diperbaharui");
    }

    public function destroy(Kosntrak $kosntrak)
    {
        Storage::delete($kosntrak->image);
        Kosntrak::destroy($kosntrak->id);
        return redirect('/admin/kosntrak')->with("message", "Berhasil menghapus Kos/Kontrakan");
    }
}
