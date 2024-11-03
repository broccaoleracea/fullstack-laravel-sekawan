<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login ()
{
   return view('oldLogin');
}
 public function postLogin (Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:4|max:10',
            'password' => 'required|min:3'
        ]);

        $username = $validated['username'];
        $password = $validated['password'];

        if ($username && $password) {
            echo "Login berhasil";
        } else {
            return back()->withErrors($validated)->withInput();
        }
    }
}
