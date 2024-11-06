<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingDetailModel extends Model
{
    use HasFactory;
    protected $table = 'borrowing_details';
    protected $primaryKey = 'detail_id';
    protected $fillable = array(
        'detail_id',
        'detail_book_id',
        'detail_borrowing_id',
        'detail_qty',
        'created_at',
        'updated_at'
    );

    public function borrowing()
    {
        return $this->belongsTo(BorrowingModel::class, 'detail_borrowing_id', 'borrowing_id');
    }

    public function book()
    {
        return $this->belongsTo(BooksModel::class, 'detail_book_id', 'book_id');
    }
}
