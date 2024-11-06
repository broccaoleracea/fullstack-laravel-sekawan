@extends('template.layout')

@section('title', 'Halaman Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h3 class="">Books List</h3>
                    <p class="">Halaman Data Buku</p>
                <a href="{{ route('create_book') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Buku</button>
                </a>
                @include('template.session_info')
                <div class="table-responsive">
                    <table class="table my-2 table-striped">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Nama Buku</th>
                                <th scope="row">Kategori</th>
                                <th scope="row">Penerbit</th>
                                <th scope="row">Penulis</th>
                                <th scope="row">ISBN</th>
                                <th scope="row">Deskripsi</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $books)    
                            <tr>
                            <td>{{ $loop->iteration }}</td>
        <td>{{ $books->book_name }}</td>
        <td>{{ $books->category->category_name ?? 'N/A' }}</td>
        <td>{{ $books->publisher->publisher_name ?? 'N/A' }}</td>
        <td>{{ $books->author->author_name ?? 'N/A' }}</td>
        <td>{{ $books->book_isbn }}</td>
        <td>{{ $books ->book_desc }}</td>
                                <td>
                                    @if($books->book_img != null)
                                    <a href="{{ asset('storage/book_pictures/'.basename($books->book_img)) }}">
                                        <button class="btn btn-success btn-sm"><i class="fas fa-paperclip"></i></button>
                                    </a>
                                    @endif
                                    <a href="{{ route('update_book', ['book_id' => $books->book_id]) }}">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('book.delete', ['book_id' => $books->book_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        {{-- @include('template.footer') --}}
    </div>
</div>
@endsection