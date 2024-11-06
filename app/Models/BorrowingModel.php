<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingModel extends Model
{
    use HasFactory;

    protected $table = 'borrowings';
    protected $primaryKey = 'borrowing_id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'borrowing_id',
        'borrowing_user_id',
        'borrowing_date',
        'borrowing_returndate',
        'borrowing_isreturned',
        'borrowing_notes',
        'borrowing_fine',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'borrowing_user_id', 'user_id');
    }

    public function borrowingDetails()
    {
        return $this->hasMany(BorrowingDetailModel::class, 'detail_borrowing_id', 'borrowing_id');
    }

    public function books()
    {
        return $this->hasManyThrough(
            BooksModel::class,
            BorrowingDetailModel::class,
            'detail_borrowing_id', // Foreign key on BorrowingDetailModel
            'book_id',             // Foreign key on BooksModel
            'borrowing_id',        // Local key on BorrowingModel
            'detail_book_id'       // Local key on BorrowingDetailModel
        );
    }
}
