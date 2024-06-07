<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PartiturController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ManageTaskController;

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
    Route::get('/manage-task', [DashboardController::class, 'manageTask'])->name('dashboard.manageTask');
    Route::get('/proposal', [DashboardController::class, 'proposal'])->name('dashboard.proposal');
    Route::get('/portofolio', [DashboardController::class, 'portofolio'])->name('dashboard.portofolio');
    
    // Route for Anggota
    Route::get('anggota', [AnggotaController::class, 'index'])->name('dashboard.tables-anggota');
    Route::post('anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    
    // Route for Partitur
    
    Route::get('partitur', [PartiturController::class, 'index'])->name('dashboard.tables-partitur');
    Route::post('partitur', [PartiturController::class, 'store'])->name('partitur.store');
    Route::get('partitur/{id}/edit', [PartiturController::class, 'edit'])->name('partitur.edit');
    Route::put('partitur/{id}', [PartiturController::class, 'update'])->name('partitur.update');
    Route::delete('partitur/{id}', [PartiturController::class, 'destroy'])->name('partitur.destroy');


    // Route for Manage Task
    Route::get('manage_task', [ManageTaskController::class, 'index'])->name('dashboard.manage_task');
    Route::post('manage_task', [ManageTaskController::class, 'store'])->name('manage_task.store');
    Route::post('manage_task/addAnggota', [ManageTaskController::class, 'addAnggota'])->name('manage_task.addAnggota');
    Route::post('manage_task/addPartitur', [ManageTaskController::class, 'addPartitur'])->name('manage_task.addPartitur');
    Route::post('manage_task/removeAnggota/{nrp}', [ManageTaskController::class, 'removeAnggota'])->name('manage_task.removeAnggota');
    Route::post('manage_task/removePartitur/{id}', [ManageTaskController::class, 'removePartitur'])->name('manage_task.removePartitur');
    Route::get('manage_task/{id}/edit', [ManageTaskController::class, 'edit'])->name('manage_task.edit');
    Route::put('manage_task/{id}', [ManageTaskController::class, 'update'])->name('manage_task.update');
    Route::delete('manage_task/{id}', [ManageTaskController::class, 'destroy'])->name('manage_task.destroy');
});

// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});