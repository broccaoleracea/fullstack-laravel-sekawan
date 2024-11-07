@extends('template.layout')

@section('title', 'Update Borrowing')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">
                <h1 class="mt-4">Update Borrowing</h1>
                <form action="{{ route('borrowings.update', ['id' => $borrowing->borrowing_id]) }}" method="POST" class="row my-4 gap-3">
                    @csrf
                    @method('PATCH')

                    <!-- User Select -->
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_user_id" class="form-label">User</label>
                        <select name="borrowing_user_id" class="form-select" required>
                            <option value="" disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ $borrowing->borrowing_user_id == $user->user_id ? 'selected' : '' }}>
                                    {{ $user->user_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Borrowing Notes -->
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_notes" class="form-label">Borrowing Notes</label>
                        <input type="text" name="borrowing_notes" id="borrowing_notes" class="form-control" value="{{ $borrowing->borrowing_notes }}">
                    </div>

                    <!-- Borrowing Fine -->
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_fine" class="form-label">Borrowing Fine</label>
                        <input type="number" name="borrowing_fine" id="borrowing_fine" class="form-control" value="{{ $borrowing->borrowing_fine }}">
                    </div>

                    <!-- Borrowing Date -->
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_date" class="form-label">Borrowing Date</label>
                        <input type="date" name="borrowing_date" class="form-control" required value="{{ $borrowing->borrowing_date }}">
                    </div>

                    <!-- Return Date -->
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="borrowing_returndate" class="form-label">Return Date</label>
                        <input type="date" name="borrowing_returndate" class="form-control" required value="{{ $borrowing->borrowing_returndate }}">
                    </div>

                    <!-- Returned Status -->
                    <h5 class="col-12 mt-4">Returned</h5>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <select name="borrowing_isreturned" class="form-select" required>
                            <option value="0" {{ $borrowing->borrowing_isreturned == 0 ? 'selected' : '' }}>Not Returned</option>
                            <option value="1" {{ $borrowing->borrowing_isreturned == 1 ? 'selected' : '' }}>Returned</option>
                        </select>
                    </div>

                    <!-- Select Books Section -->
                    <h5 class="col-12 mt-4">Select Books</h5>
                    <div id="book-section" class="col-12">
                        @foreach($borrowing->borrowingDetails as $detail)
                        <div class="row mb-3">
                            <!-- Select Book -->
                            <div class="col-12 col-md-6 col-lg-5">
                                <select name="book_ids[]" class="form-select" required>
                                    <option disabled>Select Book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->book_id }}" {{ $detail->detail_book_id == $book->book_id ? 'selected' : '' }}>{{ $book->book_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Quantity Input -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="number" name="quantities[]" class="form-control mt-2" value="{{ $detail->detail_qty }}" placeholder="Quantity" required>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-secondary mt-2" onclick="addBook()">Add Another Book</button>
                    <button type="submit" class="btn btn-primary mt-3">Update Borrowing</button>
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
            <!-- Select Book -->
            <div class="col-12 col-md-6 col-lg-5">
                <select name="book_ids[]" class="form-select" required>
                    <option value="" disabled>Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->book_id }}">{{ $book->book_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Quantity Input -->
            <div class="col-12 col-md-6 col-lg-3">
                <input type="number" name="quantities[]" class="form-control mt-2" placeholder="Quantity" required>
            </div>
        `;
        bookSection.appendChild(newBook);
    }
</script>

@endsection