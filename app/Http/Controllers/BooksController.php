<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use App\Models\BooksModel;
use App\Models\CategoriesModel;
use App\Models\PublishersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    public function viewBooks()
    {
        $data = BooksModel::with(['publisher', 'category', 'author'])->get();
        return view('admin.books.admin_books', ['level' => 'admin'])->with('books', $data);
    }

    public function viewCreateBook()
    {
        $authors = AuthorModel::all();
        $publishers = PublishersModel::all();
        $categories = CategoriesModel::all();

        return view('admin.books.admin_create_book', [
            'authors' => $authors,
            'publishers' => $publishers,
            'categories' => $categories
        ]);
    }

    public function update_book($id)
    {
        $books = BooksModel::readBookById($id);
        $authors = AuthorModel::all();
        $publishers = PublishersModel::all();
        $categories = CategoriesModel::all();

        return view('admin.books.admin_update_book', [
            'level' => 'admin',
            'authors' => $authors,
            'publishers' => $publishers,
            'categories' => $categories
        ])->with('books', $books);
    }

    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'book_id' => $id,
            'book_category_id' => $request->input('category_id'),
            'book_author_id' => $request->input('author_id'),
            'book_publisher_id' => $request->input('publisher_id'),
            'book_name' => $request->input('nama'),
            'book_isbn' => $request->input('isbn'),
            'book_desc' => $request->input('desc'),
        ];

        BooksModel::createBook($data);

        if ($request->hasFile('book_img')) {
            $imageFile = $request->file('book_img');
            BooksModel::imageUpload($id, $imageFile);
        } else {
            Log::info("no files specified ");
        }
        return redirect()->route('books')->with('success', 'Data buku berhasil ditambahkan!');
    }



    public function update(Request $request, $id)
    {
        $data = [
            'book_id' => $id,
            'book_category_id' => $request->input('category_id'),
            'book_author_id' => $request->input('author_id'),
            'book_publisher_id' => $request->input('publisher_id'),
            'book_name' => $request->input('nama'),
            'book_isbn' => $request->input('isbn'),
            'book_desc' => $request->input('desc'),
        ];

        BooksModel::updateBook($id, $data);

        if ($request->hasFile('book_img')) {
            $data = $request->file('book_img');
            BooksModel::imageUpload($id, $data);
            return redirect()->route('books')->with('updated', 'Data buku berhasil diupdate!');
        }

        return redirect()->route('books')->with('updated', 'Data buku berhasil diupdate!');
    }

    public function delete($id)
    {
        BooksModel::imageDelete($id);
        BooksModel::deleteBook($id);
        return redirect()->route('books')->with('deleted', 'Data buku berhasil dihapus!');
    }
}
