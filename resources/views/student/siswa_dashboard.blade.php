@extends('template.layout')
@section('title', 'Dashboard - siswa Perpustakaan')
@section('header')
    @include('template.navbar_student')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_student')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    @if (Auth::check())
    <p>User Level: {{ Auth::user()->user_level }}</p>
@endif
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Dashboard Siswa Perpustakaan</li>
                    </ol>
                    
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection