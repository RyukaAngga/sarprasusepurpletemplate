<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SaranaPrasaranaController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Pengguna\DashboardController as PenggunaDashboardController;
use App\Http\Controllers\Pengguna\PengaduanController;
use App\Http\Controllers\Pengguna\SaranaController as PenggunaSaranaController;
use Illuminate\Support\Facades\Route;


// ==========================
// HALAMAN AWAL
// ==========================

Route::get('/', function () {
    return redirect()->route('login');
});


// ==========================
// LOGIN & LOGOUT
// ==========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ==========================
// ADMIN AREA (PROTECTED)
// ==========================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Kelola Sarana Prasarana
        Route::resource('/sarana', SaranaPrasaranaController::class);

        // Kelola Pengaduan
        Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/{id}/edit', [AdminPengaduanController::class, 'edit'])
            ->name('pengaduan.edit');

        Route::put('/pengaduan/{id}', [AdminPengaduanController::class, 'update'])
            ->name('pengaduan.update');

        Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])
            ->name('pengaduan.show');
    });


// ==========================
// PENGGUNA / SISWA AREA (PROTECTED)
// ==========================

Route::prefix('pengguna')
    ->name('pengguna.')
    ->middleware(['auth', 'role:pengguna'])
    ->group(function () {

        // Dashboard Pengguna
        Route::get('/dashboard', [PenggunaDashboardController::class, 'index'])
            ->name('dashboard');

        // Daftar Sarana Prasarana (Siswa/Pengguna)
        Route::get('/sarana', [PenggunaSaranaController::class, 'index'])
            ->name('sarana.index');

        // Daftar / Riwayat Pengaduan
        Route::get('/pengaduan', [PengaduanController::class, 'index'])
            ->name('pengaduan.index');

        // Form Pengaduan
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
            ->name('pengaduan.create');

        // Simpan Pengaduan
        Route::post('/pengaduan', [PengaduanController::class, 'store'])
            ->name('pengaduan.store');
    });
