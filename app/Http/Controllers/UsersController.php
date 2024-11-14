<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|unique:users,user_username|max:255',
            'email' => 'required|email|unique:users,user_email|max:255',
            'notelp' => 'required|numeric|min:10', // Ensure it's a valid phone number
            'password' => 'required|string|min:8|confirmed', // This will ensure the password and password_confirmation match
        ]);

        // If validation passes, proceed with the registration logic
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
            return back()->withInput()->with('error', 'Terjadi kesalahan saat mendaftar.');
        }
    }



    public function login(Request $request)
    {
        $credentials = [
            'user_username' => $request->input('username'),
            'user_password' => $request->input('password')
        ];

        $user = User::where('user_username', $credentials['user_username'])->first();

        if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
            Auth::login($user);
            if ($user->user_level === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/user');
        } else {
            return back()->withErrors([
                'message' => 'Username atau password Anda salah.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function upload_profile(Request $request, $id)
    {
        if ($request->hasFile('profile')) {
            $data = $request->file('profile');

            User::upload_profile($id, $data);

            return redirect()->route('settings')->with('success', 'Foto profil berhasil diperbarui!');
        }

        return back()->with('failed', 'Foto profil gagal diperbarui!');
    }
}
