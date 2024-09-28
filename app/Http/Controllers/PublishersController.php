<?php

namespace App\Http\Controllers;

use App\Models\PublishersModel;
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

        PublishersModel::createpublisher($data);

        return redirect()->route('publisher')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    
}
