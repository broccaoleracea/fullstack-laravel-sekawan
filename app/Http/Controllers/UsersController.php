<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'user_id' => $id,
        'user_nama' => $request->input('nama'),
        'user_alamat' => $request->input('alamat'),
        'user_username' => $request->input('username'),
        'user_email' => $request->input('email'),
        'user_notelp' => $request->input('notelp'),
        'user_password' => bcrypt($request->input('password'))
    ];

    $user = User::register($data);

    if ($user) {
        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput();
    }
}

public function login (Request $request)
{
    $credentials = [
        'user_username' => $request->input('username'),
        'user_password' => $request->input('password')
    ];

    $user = User::where('user_username', $credentials['user_username'])->first();

    if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
        Auth::login($user);
        return redirect()->route('dashboard');
    } else {
        return back()->withErrors([
            'message' => 'Username atau password Anda salah.',
        ]);
    }
}
}
