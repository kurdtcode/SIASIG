<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk memastikan hanya pengguna yang sudah login yang bisa mengakses dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/tables', [DashboardController::class, 'tables'])->name('dashboard.tables');
    Route::get('/manage-task', [DashboardController::class, 'manageTask'])->name('dashboard.manageTask');
    Route::get('/proposal', [DashboardController::class, 'proposal'])->name('dashboard.proposal');
    Route::get('/portofolio', [DashboardController::class, 'portofolio'])->name('dashboard.portofolio');
});

// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});
