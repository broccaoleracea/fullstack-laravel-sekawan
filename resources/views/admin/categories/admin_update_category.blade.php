@extends('template.layout')

@section('title', 'Halaman Update Katgori')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Kategori</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Kategori</li>
                </ol>
                <form action="{{ route('category.update', ['category_id' => $categories->category_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kategori" value="{{ $categories->category_name }}">
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


