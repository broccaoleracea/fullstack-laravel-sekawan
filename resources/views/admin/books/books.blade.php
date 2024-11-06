@extends('template.layout')
@section('title', 'Borrowing Records')

@section('header')
    @include('template.navbar_student')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Borrowing Records</h1>
                <a href="{{ route('borrowings.create') }}" class="btn btn-primary my-3">Add New Borrowing</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Borrowing Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->borrowing_id }}</td>
                            <td>{{ $borrowing->user->user_nama }}</td>
                            <td>{{ $borrowing->borrowing_date }}</td>
                            <td>{{ $borrowing->borrowing_returndate }}</td>
                            <td>{{ $borrowing->borrowing_isreturned ? 'Returned' : 'Not Returned' }}</td>
                            <td>
                                <a href="{{ route('borrowings.show', $borrowing->borrowing_id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('borrowings.edit', $borrowing->borrowing_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('borrowings.destroy', $borrowing->borrowing_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        @include('template.footer')
    </div>
</div>
@endsection
