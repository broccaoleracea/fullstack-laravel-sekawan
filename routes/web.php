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
        
        Route::get('/publisher', [PagesController:: class, 'viewPublisher'])->name('publishers');

        Route::prefix('/create')->group(function () {
            Route::get('/publisher', [PublishersController::class, 'viewPublisher'])->name('create_publishers');
            Route::post('/publisher', [PublishersController::class, 'create'])->name('action.createpublisher');
        });

        Route::prefix('/update')->group(function () {
            Route::get('/publisher/{publisher_id}', [PagesController::class, 'update_publishers'])->name('update_publishers');
            Route::patch('/publisher/{publisher_id}', [PublishersController::class, 'update'])->name('publishers.update');
        });

        Route::delete('/delete/publisher/{publisher_id}', [PublishersController::class, 'delete'])->name('publishers.delete');
    });
    
    
    Route::prefix('/siswa')->group(function () {
    });
});