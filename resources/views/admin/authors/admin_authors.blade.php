@extends('template.layout')

@section('title', 'Authors Page')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Authors</h3>
                <p class="">Author Data Page</p>
                <a href="{{ route('create_authors') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Author</button>
                </a>
                @include('template.session_info')
        
                <div class="table-responsive my-2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Author Name</th>
                                <th scope="row">Description</th>
                                <th scope="row">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $author->author_name }}</td>
                                <td>{{ $author->author_description }}</td>
                                <td>
                                    <a href="{{ route('update_author', ['author_id' => $author->author_id]) }}">
                                        <button class="btn btn-warning mb-1"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('author.delete', ['author_id' => $author->author_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
