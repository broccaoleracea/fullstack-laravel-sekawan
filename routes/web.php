<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/admin/buku', function () {
    return view('admin.admin_buku');
});
Route::get('/admin/create', function () {
    return view('admin.admin_create_buku');
});

Route::get('/user/register', [PagesController::class, 'registerUser'])->name('register');
Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');

Route::get('/admin/update/buku', function () {
    return view('admin.admin_update_buku');
});
Route::get('/siswa/create/peminjaman', function () {
    return view('siswa_create_peminjaman');
});
Route::get('/siswa/dash', function () {
    return view('siswa_dashboard');
});

Route::get('/user/login', [PagesController::class, 'loginPage'])->name('login');
Route::post('/user/login', [UsersController::class, 'login'])->name('user.login');

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'postLogin'])->middleware('role:admin');


Route::group(['middleware' => 'role'], function () {
  Route::get('/', [PagesController::class, 'dashboardAdmin'])->name('dashboard');
});

Route::controller(PagesController::class)->group(function () {

    // Route::prefix('/admin')->group(function () {
        // Route::get('/', 'dashboardAdmin');
        // Route::get('/dash', 'dashboardAdmin');
        // Route::get('/dashboard', 'dashboardAdmin')->name('dashboard');
        
        Route::get('/publisher', [PagesController:: class, 'viewPublisher'])->name('publishers');
        Route::get('/author', [AuthorsController:: class, 'viewAuthors'])->name('authors');
        Route::get('/category', [CategoriesController::class, 'viewCategories'])->name('categories');
        Route::get('/book', [BooksController::class, 'viewBooks'])->name('books');

        Route::prefix('/create')->group(function () {
            Route::get('/publisher', [PublishersController::class, 'viewPublisher'])->name('create_publishers');
            Route::post('/publisher', [PublishersController::class, 'create'])->name('action.createpublisher');
           
            Route::get('/author', [AuthorsController::class, 'viewCreateAuthor'])->name('create_authors');
            Route::post('/author', [AuthorsController::class, 'create'])->name('action.createauthor');

            
            Route::get('/category', [CategoriesController::class, 'viewCreateCategory'])->name('create_category');
            Route::post('/category', [CategoriesController::class, 'create'])->name('action.createcategory');
        });

        Route::prefix('/update')->group(function () {
            Route::prefix('/publisher')->group(function () {
                Route::get('/{publisher_id}', [PagesController::class, 'update_publishers'])->name('update_publishers');
                Route::patch('/{publisher_id}', [PublishersController::class, 'update'])->name('publishers.update');
            });

            Route::prefix('/author')->group(function () {
                Route::get('/{author_id}', [AuthorsController::class, 'update_author'])->name('update_author');
                Route::patch('/{author_id}', [AuthorsController::class, 'update'])->name('author.update');
            });

            Route::prefix('/category')->group(function () {
                Route::get('/{category_id}', [CategoriesController::class, 'update_category'])->name('update_category');
                Route::patch('/{category_id}', [CategoriesController::class, 'update'])->name('category.update');
            });
        });
        Route::prefix('/delete')->group(function () {
            Route::delete('/publisher/{publisher_id}', [PublishersController::class, 'delete'])->name('publishers.delete');
            Route::delete('/authors/{author_id}', [AuthorsController::class, 'delete'])->name('author.delete');
            Route::delete('/category/{category_id}', [CategoriesController::class, 'delete'])->name('category.delete');
        });
    // });
    
    
    Route::prefix('/siswa')->group(function () {
    });
});