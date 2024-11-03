<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;

class BooksController extends Controller
{
 public function viewBooks() {
        return view('admin.admin_buku');
    }

    public function create (Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'publisher_id' => $id,
            'publisher_name' => $request->input('nama'),
            'publisher_addr' => $request->input('alamat'),
            'publisher_phone' => $request->input('notelp'),
            'publisher_email' => $request->input('email'),
        ];

        BooksModel::createPublishers($data);
        
        return redirect()->route('publishers')->with('success', 'Data penerbit berhasil ditambahkan!');
    }


    public function update (Request $request, $id)
    {
        $data = [
           'publisher_id' => $id,
            'publisher_name' => $request->input('nama'),
            'publisher_addr' => $request->input('alamat'),
            'publisher_phone' => $request->input('notelp'),
            'publisher_email' => $request->input('email'),
        ];

        BooksModel::updatePublishers($id, $data);

        return redirect()->route('publishers')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function delete ($id)
    {
        BooksModel::deletePublisher($id);
        return redirect()->route('publishers')->with('deleted', 'Data penerbit berhasil dihapus!');
    }
}
