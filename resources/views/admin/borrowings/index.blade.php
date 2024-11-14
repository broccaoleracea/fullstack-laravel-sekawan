@extends('template.layout')
@section('title', 'Create Borrowing')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h3>Manage Borrowings</h3>
                <a href="{{route('borrowings.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new borrowings</a>
                @include('template.session_info')
                <table class="table my-2">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Books</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Returned</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $borrowing)
                            <tr>
                                <td>{{ $borrowing->user->user_nama }}</td>
                                <td>
                                    <ul>
                                        @foreach($borrowing->borrowingDetails as $detail)
                                            <li>
                                                {{ $detail->book->book_name }}

                                                @if(count($borrowing->borrowingDetails) > 1)        
                                                <form action="{{ route('admin.borrowing.removeBook', ['borrowing_id' => $borrowing->borrowing_id, 'detail_uuid' => $detail->detail_id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-minus"></i></button>
                                                </form>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $borrowing->borrowing_date }}</td>
                                <td>{{ $borrowing->borrowing_returndate }}</td>
                                <td>@if($borrowing->borrowing_isreturned)<span class="badge text-bg-success">Returned</span>@else<span class="badge text-bg-warning">Not Returned</span>@endif</td>
                                <td>
                                    @if(!$borrowing->borrowing_isreturned)
                                    <form action="{{ route('admin.borrowing.complete', $borrowing->borrowing_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                    </form>
                                    @endif
                                    <a href="{{ route('borrowings.show', $borrowing->borrowing_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('borrowings.edit', $borrowing->borrowing_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                                <form action="{{ route('borrowings.destroy', $borrowing->borrowing_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $borrowings->links('vendor.pagination.bootstrap-5') }}
            </div>
        </main>
        @include('template.footer')
    </div>
@endsection
