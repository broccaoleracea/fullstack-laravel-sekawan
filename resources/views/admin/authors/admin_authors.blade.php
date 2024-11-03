@extends('template.layout')

@section('title', 'Halaman Penulis')

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
                    <li class="breadcrumb-item active">Halaman Data Penulis</li>
                </ol>
                <a href="{{ route('create_authors') }}">
                    <button class="btn btn-primary my-3">Tambah Penulis</button>
                </a>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('updated'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('updated') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif (session('deleted'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Nama Penulis</th>
                                <th scope="row">Deskripsi</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $authors)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $authors->author_name }}</td>
                                <td>{{ $authors->author_description }}</td>
                                <td>
                                    <a href="{{ route('update_author', ['author_id' => $authors->author_id]) }}">
                                        <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('author.delete', ['author_id' => $authors->author_id]) }}" method="POST">
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