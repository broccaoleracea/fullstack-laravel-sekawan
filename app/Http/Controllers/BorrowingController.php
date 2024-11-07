<?php

namespace App\Http\Controllers;

use App\Models\BorrowingModel;
use App\Models\BorrowingDetailModel;
use App\Models\User;
use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    // 1. Index: Show all borrowing records
    public function index()
    {
        $borrowings = BorrowingModel::with('user', 'books')->get(); // Eager load user and books
        return view('admin.borrowings.index', compact('borrowings'));
    }

    // 2. Show: Display a specific borrowing record with details
    public function show($id)
    {
        $borrowing = BorrowingModel::with('user', 'borrowingDetails.book')->findOrFail($id); // Eager load user and borrowing details with book
        return view('admin.borrowings.show', compact('borrowing'));
    }

    // 3. Create: Display the form for creating a new borrowing record
    public function create()
    {
        $users = User::all(); // Get all users for selection
        $books = BooksModel::all(); // Get all books for selection
        return view('admin.borrowings.create', compact('users', 'books'));
    }

    // 4. Store: Save a new borrowing record along with details
    public function store(Request $request)
    {
        $request->validate([
            'borrowing_user_id' => 'required|exists:users,user_id',
            'borrowing_date' => 'required|date',
            'borrowing_returndate' => 'required|date|after:borrowing_date',
            'book_ids' => 'required|array', // Array of book IDs
            'book_ids.*' => 'exists:books,book_id', // Each book ID must exist in books table
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1'
        ]);

        // Create Borrowing record
        $borrowing = BorrowingModel::create([
            $id = mt_rand(1000000000000000, 9999999999999999),
            'borrowing_id' => $id, // Unique ID
            'borrowing_user_id' => $request->borrowing_user_id,
            'borrowing_date' => $request->borrowing_date,
            'borrowing_returndate' => $request->borrowing_returndate,
            'borrowing_isreturned' => false,
            'borrowing_notes' => $request->borrowing_notes,
            'borrowing_fine' => 0
        ]);

        // Save Borrowing Details
        foreach ($request->book_ids as $index => $bookId) {
            BorrowingDetailModel::create([
                $id = mt_rand(1000000000000000, 9999999999999999),
                'detail_id' => $id, // Unique ID
                'detail_borrowing_id' => $borrowing->borrowing_id,
                'detail_book_id' => $bookId,
                'detail_qty' => $request->quantities[$index]
            ]);
        }

        return redirect()->route('admin.borrowings.index')->with('success', 'Borrowing record created successfully.');
    }

    public function edit($id)
    {
        $borrowing = BorrowingModel::with('borrowingDetails')->findOrFail($id);
        $users = User::all();
        $books = BooksModel::all();

        return view('admin.borrowings.edit', compact('borrowing', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'borrowing_date' => 'required|date',
            'borrowing_returndate' => 'required|date|after:borrowing_date',
            'borrowing_isreturned' => 'boolean',
            'book_ids' => 'required|array',
            'book_ids.*' => 'exists:books,book_id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1'
        ]);

        $borrowing = BorrowingModel::findOrFail($id);
        $borrowing->update([
            'borrowing_date' => $request->borrowing_date,
            'borrowing_returndate' => $request->borrowing_returndate,
            'borrowing_isreturned' => $request->borrowing_isreturned,
            'borrowing_notes' => $request->borrowing_notes,
            'borrowing_fine' => $request->borrowing_fine ?? 0,
        ]);


        $borrowing->borrowingDetails()->delete();
        foreach ($request->book_ids as $index => $bookId) {
            BorrowingDetailModel::create([
                $id = mt_rand(1000000000000000, 9999999999999999),
                'detail_id' => $id, // Unique ID
                'detail_borrowing_id' => $borrowing->borrowing_id,
                'detail_book_id' => $bookId,
                'detail_qty' => $request->quantities[$index]
            ]);
        }

        return redirect()->route('admin.borrowings.index')->with('success', 'Borrowing record updated successfully.');
    }

    public function confirmBorrow(Request $request)
    {
        $request->validate([
            'book_ids' => 'required|array',
            'book_ids.*' => 'exists:books,book_id'
        ]);

        $borrowId = mt_rand(1000000000000000, 9999999999999999);
        $borrowDate = now();
        $returnDate = now()->addWeek();

        $borrowing = BorrowingModel::create([
            'borrowing_id' => $borrowId,
            'borrowing_user_id' => Auth::id(),
            'borrowing_date' => $borrowDate,
            'borrowing_returndate' => $returnDate,
            'borrowing_isreturned' => 0
        ]);

        foreach ($request->book_ids as $bookId) {
            BorrowingDetailModel::create([
                $id = mt_rand(1000000000000000, 9999999999999999),
                'detail_id' => $id,
                'detail_borrowing_id' => $borrowId,
                'detail_book_id' => $bookId,
                'detail_qty' => 1
            ]);
        }

        return redirect()->route('user.borrowings.history')->with('success', 'Books successfully borrowed!');
    }

    public function showBookPage()
    {
        $data = BooksModel::with(['publisher', 'category', 'author'])->get();

        return view(
            'student.books.index'
        )->with('books', $data);
    }
    public function showBorrowingHistory()
    {
        $userId =
            Auth::id();
        $borrowings = BorrowingModel::where('borrowing_user_id', $userId)
            ->with('borrowingDetails.book')
            ->get();

        return view('student.borrowings.index', compact('borrowings'));
    }



    // Mark as returned
    public function complete($id)
    {
        $borrowing = BorrowingModel::findOrFail($id);
        $borrowing->update(['borrowing_isreturned' => 1]);

        return redirect()->route('admin.borrowings.index')->with('success', 'Borrowing marked as complete.');
    }

    // Remove book from borrowing
    public function removeBook(string $borrowingId, string $detailId)
    {
        Log::info("Removing book with detail_id: $detailId from borrowing_id: $borrowingId");

        $deleted = BorrowingDetailModel::where('detail_borrowing_id', $borrowingId)
            ->where('detail_id', $detailId)
            ->delete();

        if ($deleted) {
            return back()->with('success', 'Book removed from borrowing.');
        } else {
            return back()->with('error', 'Failed to remove the book from borrowing.');
        }
    }


    // 7. Destroy: Delete a borrowing record
    public function destroy($id)
    {
        $borrowing = BorrowingModel::findOrFail($id);
        $borrowing->borrowingDetails()->delete(); // Delete related details
        $borrowing->delete();

        return redirect()->route('admin.borrowings.index')->with('success', 'Borrowing record deleted successfully.');
    }
}
