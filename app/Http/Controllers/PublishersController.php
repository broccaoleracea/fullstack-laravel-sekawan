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
            'publisher_nama' => $request->input('nama'),
            'publisher_alamat' => $request->input('alamat'),
            'publisher_notelp' => $request->input('notelp'),
            'publisher_email' => $request->input('email'),
        ];

        Publishers::createpublisher($data);
        
        return redirect()->route('admin_view_publisher')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function viewPublisher() {
        return view('admin.admin_create_publisher');
    }

    
}
