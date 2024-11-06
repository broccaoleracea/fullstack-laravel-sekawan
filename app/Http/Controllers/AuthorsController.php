<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function viewAuthors() {
        $data = AuthorModel::readAuthors();
        return view('admin.authors.admin_authors', ['level' => 'admin'])->with('authors', $data);
    }

    public function create (Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'author_id' => $id,
            'author_name' => $request->input('nama'),
            'author_description' => $request->input('desc'),
        ];

        AuthorModel::createAuthors($data);
        
        return redirect()->route('authors')->with('success', 'Data penulis berhasil ditambahkan!');
    }

    public function viewCreateAuthor() {
        return view('admin.authors.admin_create_authors');
    }

    public function update (Request $request, $id)
    {
        $data = [
           'author_id' => $id,
            'author_name' => $request->input('nama'),
            'author_description' => $request->input('desc'),
        ];

        AuthorModel::updateAuthors($id, $data);

        return redirect()->route('authors')->with('updated', 'Data penulis berhasil diupdate!');
    }

    public function delete ($id)
    {
        AuthorModel::deleteAuthor($id);
        return redirect()->route('authors')->with('deleted', 'Data penulis berhasil dihapus!');
    }

    public function update_author ($id) {
        $authors = AuthorModel::readAuthorById($id);
    
        return view('admin.authors.admin_update_authors', ['level' => 'admin'])->with('authors', $authors);
    }
}
