@extends('template.layout')

@section('title', 'Books Page')

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
                {{-- <p class="">Book Data Page</p> --}}
                <a href="{{ route('create_book') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Book</button>
                </a>
                @include('template.session_info')
                <div class="table-responsive">
                    <table class="table my-2 table-striped">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Book Name</th>
                                <th scope="row">Category</th>
                                <th scope="row">Publisher</th>
                                <th scope="row">Author</th>
                                <th scope="row">ISBN</th>
                                <th scope="row">Description</th>
                                <th scope="row">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->book_name }}</td>
                                <td>{{ $book->category->category_name ?? 'N/A' }}</td>
                                <td>{{ $book->publisher->publisher_name ?? 'N/A' }}</td>
                                <td>{{ $book->author->author_name ?? 'N/A' }}</td>
                                <td>{{ $book->book_isbn }}</td>
                                <td>{{ $book->book_desc }}</td>
                                <td>
                                    @if($book->book_img != null)
                                        <a href="{{ asset('storage/book_pictures/'.basename($book->book_img)) }}">
                                            <button class="btn btn-success btn-sm mr-1 mb-1"><i class="fas fa-paperclip"></i></button>
                                        </a>
                                    @endif
                                    <a href="{{ route('update_book', ['book_id' => $book->book_id]) }}">
                                        <button class="btn btn-warning btn-sm mr-1 mb-1 "><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('book.delete', ['book_id' => $book->book_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm mr-1 mb-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        @include('template.footer')
    </div>
</div>
@endsection
