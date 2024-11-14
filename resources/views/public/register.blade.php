@extends('template.layout')

@section('title', 'Register - Web Perpustakaan')

@section('main')
    <section class="login-container">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="card shadow-lg">
            <div class="card-header">
                <img src="{{ asset('img/book.png') }}" alt="..." class="img-logo">
                <h3 class="text-center">Register - Web Perpustakaan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.register') }}" method="POST" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap *</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group my-3">
                        <label for="alamat" class="form-label">Alamat *</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat Anda" value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group my-3">
                        <label for="username" class="form-label">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda" value="{{ old('username') }}">
                    </div>
                    <div class="form-group my-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                    </div>
                    <div class="form-group my-3">
                        <label for="notelp" class="form-label">Nomor Telp *</label>
                        <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan no telepon Anda">
                    </div>
                    <div class="form-group my-3">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda">
                    </div>
                    
                    <div class="form-group my-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password Anda">
                    </div>
                    
                    <div class="form-group my-3">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('login') }}"><p class="text-primary text-center">Sudah punya akun? Silahkan login</p></a>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('register-form').addEventListener('submit', function (event) {
            let isValid = true;

            const nama = document.getElementById('nama').value;
            const alamat = document.getElementById('alamat').value;
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const notelp = document.getElementById('notelp').value;
            const password = document.getElementById('password').value;

            if (!nama || !alamat || !username || !email || !notelp || !password) {
                isValid = false;
                alert('Semua kolom wajib diisi!');
            }

            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (email && !emailRegex.test(email)) {
                isValid = false;
                alert('Format email tidak valid!');
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@endsection
