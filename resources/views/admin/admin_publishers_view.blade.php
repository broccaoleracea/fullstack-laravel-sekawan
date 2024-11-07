@extends('template.layout')

@section('title', 'Publishers Page')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h3 class="">Publishers</h3>
                <a href="{{ route('create_publishers') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Publisher</button>
                </a>
                @include('template.session_info')
                <div class="table-responsive mt-2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Publisher Name</th>
                                <th scope="row">Publisher Address</th>
                                <th scope="row">Publisher Phone</th>
                                <th scope="row">Publisher Email</th>
                                <th scope="row">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $publisher->publisher_name }}</td>
                                <td>{{ $publisher->publisher_addr }}</td>
                                <td>{{ $publisher->publisher_phone }}</td>
                                <td>{{ $publisher->publisher_email }}</td>
                                <td>
                                    <a href="{{ route('update_publishers', ['publisher_id' => $publisher->publisher_id]) }}">
                                        <button class="btn btn-warning mb-1"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form action="{{ route('publishers.delete', ['publisher_id' => $publisher->publisher_id]) }}" method="POST">
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
