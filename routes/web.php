<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PartiturController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ManageTaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LatihanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;

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
// Route Login Logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Middleware untuk memastikan hanya pengguna yang sudah login yang bisa mengakses dashboard
Route::middleware(['auth'])->group(function () {
    Route::middleware(['superadmin'])->group(function () {
        // Route for creating admins
        Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/create-admin', [AdminController::class, 'store'])->name('admin.store');

        // Route for creating anggota
        Route::get('/create-anggota', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::post('/create-anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    });

    Route::middleware(['admin', 'superadmin'])->group(function () {
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

        // Route for Update Absensi
        Route::get('/task-list', [TaskController::class, 'index'])->name('dashboard.task-list');
        Route::get('/absensi/{taskId}/check', [AbsensiController::class, 'showCheckForm'])->name('absensi.check');
        Route::post('/absensi/{taskId}/check', [AbsensiController::class, 'submitCheckForm'])->name('absensi.submitCheckForm');
        Route::get('/absensi/{taskId}/sheet-report', [AbsensiController::class, 'showSheetReport'])->name('absensi.sheetReport');
        Route::post('/update-absensi', [AbsensiController::class, 'updateAbsensi'])->name('updateAbsensi');

        // Route for PDF Export (Task)
        Route::get('/export-tasks-pdf', [TaskController::class, 'exportToPDF'])->name('export.tasks.pdf');
    });

    Route::middleware(['admin', 'superadmin'])->group(function () {
        // Route for creating anggota (admin can create anggota)
        Route::get('/create-anggota', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::post('/create-anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    });

    // Routes accessible only to 'anggota'
    Route::middleware(['role:anggota'])->group(function () {
        Route::get('/list-kegiatan', [LatihanController::class, 'listKegiatan'])->name('kegiatan.list');
        Route::get('/list-latihan', [LatihanController::class, 'listLatihan'])->name('latihan.list');
        Route::get('/list-partitur', [PartiturController::class, 'listPartitur'])->name('partitur.list');
    });
});

// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});
