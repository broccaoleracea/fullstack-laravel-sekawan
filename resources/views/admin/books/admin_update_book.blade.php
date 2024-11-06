@extends('template.layout')

@section('title', 'Halaman Update Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Buku</li>
                </ol>
                <form action="{{ route('book.update', ['book_id' => $books->book_id]) }}" class="row my-4 gap-3" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="nama" class="form-label">Nama Buku</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama buku" value="{{ $books->book_name }}">
                    </div>
              <!-- Author Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="author" class="form-label">Author name</label>
        <select name="author_id" id="author" class="form-control">
            <option value="" disabled>Select an author</option>
            @foreach($authors as $author)
                <option value="{{ $author->author_id }}" 
                    {{ $books->book_author_id == $author->author_id ? 'selected' : '' }}>
                    {{ $author->author_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Publisher Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="publisher" class="form-label">Publisher name</label>
        <select name="publisher_id" id="publisher" class="form-control">
            <option value="" disabled>Select a publisher</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->publisher_id }}" 
                    {{ $books->book_publisher_id == $publisher->publisher_id ? 'selected' : '' }}>
                    {{ $publisher->publisher_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Category Select -->
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label for="category" class="form-label">Category name</label>
        <select name="category_id" id="category" class="form-control">
            <option value="" disabled>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}" 
                    {{ $books->book_category_id == $category->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="desc" class="form-label">Deskripsi Buku</label>
                        <input type="text" name="desc" id="desc" class="form-control" value="{{ $books->book_desc }}" placeholder="Masukkan deskripsi buku">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="isbn" class="form-label">ISBN Buku</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $books->book_isbn }}" placeholder="Masukkan ISBN buku">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="book_img" class="form-label">Upload Book Cover</label>
                            <input type="file" name="book_img" id="book_img" value="{{ $books->book_img }}" class="form-control">
                        </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <button class="btn btn-success" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </main>
        {{-- @include('template.footer') --}}
    </div>
</div>
@endsection