<?php

namespace App\Http\Controllers;

use App\Models\PublishersModel as Publishers;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
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

        Publishers::createPublishers($data);
        
        return redirect()->route('publishers')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function viewPublisher() {
        return view('admin.admin_create_publisher');
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

        Publishers::updatePublishers($id, $data);

        return redirect()->route('publishers')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function delete ($id)
    {
        Publishers::deletePublisher($id);
        return redirect()->route('publishers')->with('deleted', 'Data penerbit berhasil dihapus!');
    }
}
