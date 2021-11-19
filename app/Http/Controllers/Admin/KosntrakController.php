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
            'user_id' => 'required',
            'jenis' => 'required|min:3|max:255',
            'nama_tempat' => 'required|min:3|max:255',
            'alamat' => 'required|min:3|max:255',
            'maps' => 'required|min:3',
            'keterangan' => 'required|min:3|max:255',
            'harga_sewa' => 'required|min:3|max:255',
            'gambar' => 'image|file|max:4096',
            'status_kamar' => 'required',
            'status_kamarmandi' => 'required',
            'wifi' => 'nullable|string',
            'laundry' => 'nullable|string',
            'warung_makan' => 'required|numeric',
            'peraturan' => 'required|min:3',
        ]);

        $currentuser = User::where('id', $request->user_id)->first();
        if ($currentuser->hasRole(['user', 'admin'])) {
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
            'user_id' => 'required',
            'jenis' => 'required|min:3|max:255',
            'nama_tempat' => 'required|min:3|max:255',
            'alamat' => 'required|min:3|max:255',
            'maps' => 'required|min:3',
            'keterangan' => 'required|min:3|max:255',
            'harga_sewa' => 'required|min:3|max:255',
            'gambar' => 'image|file|max:4096',
            'status_kamar' => 'required|min:3|max:255',
            'status_kamarmandi' => 'required|min:3|max:255',
            'wifi' => 'nullable|string',
            'laundry' => 'nullable|string',
            'warung_makan' => 'required|numeric',
            'peraturan' => 'required|min:3',
        ]);

        if ($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kosntrak-images');
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
