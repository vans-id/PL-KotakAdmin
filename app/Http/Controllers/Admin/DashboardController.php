<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kosntrak;
use App\Models\Admin\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kosntraks = Kosntrak::all();
        $transactions = Transaction::all();
        $pendingTransactions = Transaction::where('payment_status', '=', 0);
        $users = User::whereRoleIs(['user', 'owner'])->get();

        return view('admin.dashboard', [
            "title" => "Dashboard",
            "kosntraks" => $kosntraks->count(),
            "transactions" => $transactions->count(),
            "users" => $users->count(),
            "pendingTransactions" => $pendingTransactions->count(),
        ]);
    }
}
