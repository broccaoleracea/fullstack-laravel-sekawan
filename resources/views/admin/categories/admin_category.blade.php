@extends('template.layout')

@section('title', 'Book Categories Page')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h3 class="">Book Categories</h3> 
                <a href="{{ route('create_category') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</button>
                </a>
                @include('template.session_info')
                <div class="table-responsive my-2">
                    <table class="table table-striped my-2">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Category Name</th>
                                <th scope="row">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('update_category', ['category_id' => $category->category_id]) }}">
                                        <button class="btn btn-warning btn-sm mr-1 mb-1"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('category.delete', ['category_id' => $category->category_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mr-1 mb-1 btn-sm "><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories
                ->links('vendor.pagination.bootstrap-5') }}
            </div>
        </main>
        @include('template.footer')
    </div>
</div>
@endsection
