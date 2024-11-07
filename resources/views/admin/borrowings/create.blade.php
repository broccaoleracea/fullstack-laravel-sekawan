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
                <h2 class="">Create Borrowing</h2>
                <form action="{{ route('borrowings.store') }}" method="POST" class="row my-4 gap-3">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_user_id" class="form-label">User</label>
                        <select name="borrowing_user_id" class="form-select" required>
                            <option value="" disabled selected>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->user_nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_notes" class="form-label">Borrowing Notes</label>
                        <input type="text" name="borrowing_notes" id="borrowing_notes" class="form-control" placeholder="Enter borrowing note">
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_fine" class="form-label">Borrowing Fine</label>
                        <input type="number" name="borrowing_fine" id="borrowing_fine" class="form-control" placeholder="Enter borrowing fine">
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_date" class="form-label">Borrowing Date</label>
                        <input type="date" name="borrowing_date" class="form-control" required>
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_returndate" class="form-label">Return Date</label>
                        <input type="date" name="borrowing_returndate" class="form-control" required>
                    </div>

                    <h5 class="col-12 mt-4">Select Books</h5>
                    <div id="book-section" class="col-12">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <select name="book_ids[]" class="form-select" required>
                                    <option value="" disabled selected>Select Book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->book_id }}">{{ $book->book_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="number" name="quantities[]" class="form-control" placeholder="Quantity" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" onclick="addBook()">Add Another Book</button>
                    <button type="submit" class="btn btn-success mt-3">Create Borrowing</button>
                </form>
            </div>
        </main>
        @include('template.footer')
    </div>
</div>

<script>
    function addBook() {
        const bookSection = document.getElementById('book-section');
        const newBook = document.createElement('div');
        newBook.classList.add('row', 'mb-3');
        newBook.innerHTML = `
            <div class="col-12 col-md-6">
                <select name="book_ids[]" class="form-select" required>
                    <option value="" disabled selected>Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->book_id }}">{{ $book->book_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6">
                <input type="number" name="quantities[]" class="form-control" placeholder="Quantity" required>
            </div>
        `;
        bookSection.appendChild(newBook);
    }
</script>

@endsection
