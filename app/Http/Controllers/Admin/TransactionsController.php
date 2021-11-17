<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Transaction;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['kosntrak', 'user'])->get();

        return view('admin.transactions.index', [
            "title" => "Transaksi",
            "transactions" => $transactions,
        ]);
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit', [
            "title" => "Edit Transaksi",
            "transaction" => $transaction
        ]);
    }

    public function create()
    {
        return view('admin.transactions.add', ["title" => "Tambah Transaksi"]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'kosntrak_id' => 'required',
            'payment_status' => 'required',
            'start_date' => 'required|min:3|max:255',
            'end_date' => 'required|min:3|max:255',
        ]);

        $owner = User::where('id', $request->user_id);
        if ($owner->hasRole(['owner', 'admin'])) {
            return redirect('/admin/transactions/create')->with("message", "User tidak boleh terdaftar sebagai pemilik / admin");
        }

        Transaction::create($data);

        return redirect('/admin/transactions')->with("message", "Transaksi berhasil ditambahkan");
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'kosntrak_id' => 'required',
            'payment_status' => 'required',
            'start_date' => 'required|min:3|max:255',
            'end_date' => 'required|min:3|max:255',
        ]);

        Transaction::where('id', $transaction->id)
            ->update($data);
        return redirect('/admin/transactions')->with("message", "Transaksi berhasil diperbaharui");
    }

    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect('/admin/transactions')->with("message", "Berhasil menghapus transaksi");
    }
}
