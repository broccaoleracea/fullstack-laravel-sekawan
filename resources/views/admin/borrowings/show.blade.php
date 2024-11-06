@extends('template.layout')
@section('title', 'Borrowing Details')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h1 class="mt-4">Borrowing Details</h1>
                <div class="card my-4">
                    <div class="card-body">
                        <h5>User: {{ $borrowing->user->user_nama }}</h5>
                        <p>Borrowing Date: {{ $borrowing->borrowing_date }}</p>
                        <p>Return Date: {{ $borrowing->borrowing_returndate }}</p>
                        <p>Status: @if($borrowing->borrowing_isreturned)<span class="badge text-bg-success">Returned</span>@else<span class="badge text-bg-warning">Not Returned</span>@endif</p>
                        <p>Notes: {{ $borrowing->borrowing_notes }}</p>
                        <p>Fine: ${{ $borrowing->borrowing_fine }}</p>
                    </div>
                </div>
                <h4>Borrowed Books</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowing->borrowingDetails as $detail)
                        <tr>
                            <td>{{ $detail->book->book_id }}</td>
                            <td>{{ $detail->book->book_name }}</td>
                            <td>{{ $detail->detail_qty }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('admin.borrowings.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                <a href="{{ route('borrowings.edit', $borrowing->borrowing_id) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
        </main>
        @include('template.footer')
    </div>
</div>
@endsection
