<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PublishersController;

Route::get('/', function () {
    return view('login');
});
Route::get('/admin/buku', function () {
    return view('admin.admin_buku');
});
Route::get('/admin/create', function () {
    return view('admin.admin_create_buku');
});

Route::get('/admin/update/buku', function () {
    return view('admin.admin_update_buku');
});
Route::get('/siswa/create/peminjaman', function () {
    return view('siswa_create_peminjaman');
});
Route::get('/siswa/dash', function () {
    return view('siswa_dashboard');
});

Route::get('/login', [PagesController::class, 'loginPage'])->name('login');

Route::controller(PagesController::class)->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/', 'dashboardAdmin');
        Route::get('/dash', 'dashboardAdmin');
        Route::get('/dashboard', 'dashboardAdmin');
    });
    
    Route::prefix('/create')->group(function () {
        Route::post('/createpenerbit', [PublishersController::class, 'create'])->name('action.createpenerbit');
    });

    Route::prefix('/siswa')->group(function () {
    });
});