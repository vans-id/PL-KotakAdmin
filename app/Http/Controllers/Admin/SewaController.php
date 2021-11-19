<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Sewa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SewaController extends Controller
{
    public function index()
    {
        $transactions = Sewa::with(['kosntrak', 'user'])->get();

        return view('admin.sewas.index', [
            "title" => "Transaksi",
            "transactions" => $transactions,
        ]);
    }

    public function create()
    {
        return view('admin.sewas.add', ["title" => "Tambah Transaksi"]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'kosntrak_id' => 'required',
            'tanggal' => 'required|min:3|max:255',
            'status_sewa' => 'sometimes',
            'status_bayar' => 'sometimes',
        ]);

        $user = User::where('id', $request->user_id)->first();
        if ($user->hasRole(['owner', 'admin'])) {
            return redirect('/admin/sewas/create')->with("message", "User tidak boleh terdaftar sebagai pemilik / admin");
        }

        Sewa::create($data);

        return redirect('/admin/sewas')->with("message", "Transaksi berhasil ditambahkan");
    }

    public function show(Sewa $sewa)
    {
        dd($sewa, Sewa::with(['kosntrak', 'user'])->get());
    }

    public function edit(Sewa $sewa)
    {
        return view('admin.sewas.edit', [
            "title" => "Edit Transaksi",
            "transaction" => $sewa
        ]);
    }

    public function update(Request $request, Sewa $sewa)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'kosntrak_id' => 'required',
            'tanggal' => 'required|min:3|max:255',
            'status_sewa' => 'sometimes',
            'status_bayar' => 'sometimes',
        ]);

        Sewa::where('id', $sewa->id)
            ->update($data);
        return redirect('/admin/sewas')->with("message", "Transaksi berhasil diperbaharui");
    }

    public function destroy(Sewa $sewa)
    {
        Sewa::destroy($sewa->id);
        return redirect('/admin/sewas')->with("message", "Berhasil menghapus transaksi");
    }
}
