@extends('template.layout')
@section('title', 'Dashboard - siswa Perpustakaan')
@section('header')
    @include('template.navbar_student')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_student')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3>Select Books to Borrow</h3>
                    <form id="borrowForm" method="POST" action="{{ route('user.borrow.confirm') }}">
                        @csrf
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <input type="checkbox" name="book_ids[]" value="{{ $book->book_id }}">
                                            <label>{{ $book->book_name }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
                            Confirm Selection
                        </button>
                    </form>
                    
                    <!-- Modal for Confirmation -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Borrow</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to borrow these books?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="borrowForm" class="btn btn-primary">Confirm Borrow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('template.footer')
        </div>
    </div>
@endsection
