<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('login');
});

//Register routes
Route::get('/register', [PagesController::class, 'registerUser'])->name('register');
Route::post('/register', [UsersController::class, 'register'])->name('user.register');
//Login/out routes 
Route::get('/login', [PagesController::class, 'loginPage'])->name('login');
Route::post('/login', [UsersController::class, 'login'])->name('user.login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout')->middleware('auth');

// Route::group(['middleware' => 'role'], function () {
//     //Admin pages
Route::prefix('/admin')->middleware(['role'])->group(function () {
    Route::get('/', [PagesController::class, 'dashboardAdmin'])->name('dashboard');
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    });

    //Pages
    Route::get('/publisher', [PagesController::class, 'viewPublisher'])->name('publishers');
    Route::get('/author', [AuthorsController::class, 'viewAuthors'])->name('authors');
    Route::get('/category', [CategoriesController::class, 'viewCategories'])->name('categories');
    Route::get('/book', [BooksController::class, 'viewBooks'])->name('books');
    Route::prefix('borrowings')->group(function () {
        Route::get('/', [BorrowingController::class, 'index'])->name('admin.borrowings.index');
    });

    Route::prefix('/create')->group(function () {
        Route::get('/publisher', [PublishersController::class, 'viewPublisher'])->name('create_publishers');
        Route::post('/publisher', [PublishersController::class, 'create'])->name('action.createpublisher');

        Route::get('/author', [AuthorsController::class, 'viewCreateAuthor'])->name('create_authors');
        Route::post('/author', [AuthorsController::class, 'create'])->name('action.createauthor');

        Route::get('/category', [CategoriesController::class, 'viewCreateCategory'])->name('create_category');
        Route::post('/category', [CategoriesController::class, 'create'])->name('action.createcategory');

        Route::get('/book', [BooksController::class, 'viewCreateBook'])->name('create_book');
        Route::post('/book', [BooksController::class, 'create'])->name('action.createbook');

        Route::prefix('borrowings')->group(function () {
            Route::get('/', [BorrowingController::class, 'create'])->name('borrowings.create');
            Route::post('/', [BorrowingController::class, 'store'])->name('borrowings.store');
            Route::get('/{id}', [BorrowingController::class, 'show'])->name('borrowings.show');
        });
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

        Route::prefix('/book')->group(function () {
            Route::get('/{book_id}', [BooksController::class, 'update_book'])->name('update_book');
            Route::patch('/{book_id}', [BooksController::class, 'update'])->name('book.update');
        });

        Route::prefix('borrowings')->group(function () {
            Route::get('/{id}', [BorrowingController::class, 'edit'])->name('borrowings.edit');
            Route::patch('/{id}', [BorrowingController::class, 'update'])->name('borrowings.update');
            Route::patch('/return/{id}', [BorrowingController::class, 'complete'])->name('admin.borrowing.complete');
            Route::delete('/delete/{borrowing_id}/{detail_uuid}', [BorrowingController::class, 'removeBook'])
                ->where(['borrowing_id' => '[0-9a-f]+', 'detail_uuid' => '[0-9a-f]+'])
                ->name('admin.borrowing.removeBook');
        });
    });

    Route::prefix('/delete')->group(function () {
        Route::delete('/publisher/{publisher_id}', [PublishersController::class, 'delete'])->name('publishers.delete');
        Route::delete('/authors/{author_id}', [AuthorsController::class, 'delete'])->name('author.delete');
        Route::delete('/category/{category_id}', [CategoriesController::class, 'delete'])->name('category.delete');
        Route::delete('/book/{book_id}', [BooksController::class, 'delete'])->name('book.delete');

        Route::prefix('borrowings')->group(function () {
            Route::delete('/{id}', [BorrowingController::class, 'destroy'])->name('borrowings.destroy');
        });
    });
});

//Settings
Route::prefix('/settings')->middleware(['role'])->group(
    function () {
        Route::get('/', function () {
            return view('settings');
        })->name('settings');
        Route::patch('/{id}/update_profile', [UsersController::class, 'upload_profile'])->name('action.upload_profile');
    }
);

//User pages
Route::prefix('/user')->middleware(['role'])->group(
    function () {
        Route::get('/', [PagesController::class, 'dashboardSiswa'])->name('dashboardSiswa');
        Route::get('/dashboard', function () {
            return redirect()->route('dashboardSiswa');
        });
        Route::get('/books', [BorrowingController::class, 'showBookPage'])->name('user.borrow');
        Route::get('/borrowings', [BorrowingController::class, 'showBorrowingHistory'])->name('user.borrowings.history');
        Route::prefix('create')->group(function () {
            Route::post('/borrowings', [BorrowingController::class, 'confirmBorrow'])->name('user.borrow.confirm');
        });
    }
);
// s
