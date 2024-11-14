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
                <div class="container-fluid p-4">
                    <h3>Select Books to Borrow</h3>
                    <form id="borrowForm" method="POST" action="{{ route('user.borrow.confirm') }}">
                        @csrf
                        <div class="row">
                            @foreach ($books as $book)
                            <div class="col-md-2">
                                        <label for="book_ids[]">
                                            <div class="card mb-3">
                                                <img src="{{ asset('storage/book_pictures/' . basename($book->book_img)) }}" class="card-img-top" alt="...">
                                                <div class="card-body card-body-books">
                                                    <input type="checkbox" name="book_ids[]" id="book_ids[]"
                                                           value="{{ $book->book_id }}">
                                                    <h5 class="text-truncate multi-line-truncate">{{ $book->book_name }}</h5>
                                    
                                                    <!-- Modal Trigger Button -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookModal{{ $book->book_id }}">
                                                        <i class="fas fa-list"></i> Detail
                                                    </button>
                                                </div>
                                            </div>
                                    </label>
                                    </div>

                                <div class="modal fade" id="bookModal{{ $book->book_id }}" tabindex="-1" aria-labelledby="bookModalLabel{{ $book->book_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="bookModalLabel{{ $book->book_id }}">Book Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Book Name:</strong> {{ $book->book_name }}</p>
                                                <p><strong>ISBN:</strong> {{ $book->book_isbn }}</p>
                                                <p><strong>Category:</strong> {{ $book->category->category_name ?? 'N/A' }}</p>
                                                <p><strong>Publisher:</strong> {{ $book->publisher->publisher_name ?? 'N/A' }}</p>
                                                <p><strong>Author:</strong> {{ $book->author->author_name ?? 'N/A' }}</p>
                                                <p><strong>Description:</strong> {{ $book->book_desc }}</p>
                                                <div>
                                                    <strong>Book Image:</strong><br>
                                                    <img src="{{ asset('storage/book_pictures/'.basename($book->book_img)) }}" alt="Book Image" class="img-fluid" style="max-width: 100%; max-height: 300px;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#confirmModal">
                            Confirm Selection
                        </button>
                    </form>

                    <!-- Modal for Confirmation -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Borrow</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to borrow these books?
                                    The default borrowing period is one week. If you wish to extend the period, please contact the library Administrator.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="borrowForm" class="btn btn-primary">Confirm Borrow</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookModalLabel">Book Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Book Name: <span id="modalBookName"></span></h6>
                                    <p><strong>ISBN:</strong> <span id="modalBookIsbn"></span></p>
                                    <p><strong>Category:</strong> <span id="modalBookCategory"></span></p>
                                    <p><strong>Publisher:</strong> <span id="modalBookPublisher"></span></p>
                                    <p><strong>Author:</strong> <span id="modalBookAuthor"></span></p>
                                    <p><strong>Description:</strong> <span id="modalBookDesc"></span></p>
                                    <div>
                                        <strong>Book Image:</strong><br>
                                        <img id="modalBookImg" src="" alt="Book Image" class="img-fluid" style="max-width: 100%; max-height: 300px;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
