@extends('template.layout')
@section('title', 'Create Borrowing')

@section('header')
    @include('template.navbar_student')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_student')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h3>Manage Borrowings</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Books</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                            <th>Notes</th>
                            <th>Returned</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $borrowing)
                            <tr>
                                <td>
                                    <ul>
                                        @foreach($borrowing->borrowingDetails as $detail)
                                            <li>
                                                <span>{{ $detail->book->book_name }}</span><span class="font-weight-light text-gray-600">{{'('}}{{$detail->detail_qty}}{{')'}}</span>
                                                
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $borrowing->borrowing_date }} </td>
                                <td>{{ $borrowing->borrowing_returndate }}</td>
                                <td>{{ $borrowing->borrowing_fine }}</td>
                                <td>{{ $borrowing->borrowing_notes }}</td>
                                
                                <td>@if($borrowing->borrowing_isreturned)<span class="badge text-bg-success">Returned</span>@else<span class="badge text-bg-warning">Not Returned</span>@endif</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        @include('template.footer')
    </div>
@endsection
