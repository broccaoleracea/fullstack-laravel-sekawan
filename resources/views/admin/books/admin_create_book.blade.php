@extends('template.layout')

@section('title', 'Halaman Create Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h2 class="">Tambah Buku Baru</h2>
                <form action="{{ route('action.createbook') }}" class="row my-4 gap-3" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Buku</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama buku">
                    </div>
                     <!-- Author Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="author" class="form-label">Author name</label>
        <select name="author_id" id="author" class="form-control">
            <option value="" disabled selected>Select an author</option>
            @foreach($authors as $author)
                <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Publisher Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="publisher" class="form-label">Publisher name</label>
        <select name="publisher_id" id="publisher" class="form-control">
            <option value="" disabled selected>Select a publisher</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->publisher_id }}">{{ $publisher->publisher_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Category Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="category" class="form-label">Category name</label>
        <select name="category_id" id="category" class="form-control">
            <option value="" disabled selected>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="desc" class="form-label">Deskripsi Buku</label>
                        <input type="text" name="desc" id="desc" class="form-control" placeholder="Masukkan deskripsi buku">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="isbn" class="form-label">ISBN Buku</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukkan ISBN buku">
                    </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="book_img" class="form-label">Upload Book Cover</label>
                            <input type="file" name="book_img" id="book_img" class="form-control">
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