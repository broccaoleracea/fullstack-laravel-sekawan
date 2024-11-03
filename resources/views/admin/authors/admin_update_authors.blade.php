@extends('template.layout')

@section('title', 'Halaman Update Penulis')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Penulis</li>
                </ol>
                <form action="{{ route('author.update', ['author_id' => $authors->author_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Penulis</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penulis" value="{{ $authors->author_name }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="alamat" class="form-label">Deskripsi Penulis</label>
                        <input type="textarea" name="desc" id="desc" class="form-control" placeholder="Masukkan deskripsi penulis" value="{{ $authors->author_description }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
        {{-- @include('template.footer') --}}
    </div>
</div>
@endsection