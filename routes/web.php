<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SewaController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\KosntrakController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    // LOGIN
    Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'authenticate']);
    // REGISTER
    Route::get('/admin/register', [RegisterController::class, 'index']);
    Route::post('/admin/register', [RegisterController::class, 'store']);
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    // DASHBOARD, LOGOUT
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);

    // KOSNTRAK
    Route::resource('/admin/kosntrak', KosntrakController::class);

    // PENGGUNA
    Route::resource('/admin/users', UsersController::class);

    // TRANSAKSI SEWA
    // Route::resource('/admin/transactions', TransactionsController::class);
    // TRANSAKSI SEWA
    Route::resource('/admin/sewas', SewaController::class);
});
