<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BooksModel extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $fillable = array(
        'book_id',
        'book_category_id',
        'book_publisher_id',
        'book_author_id',
        'book_name',
        'book_isbn',
        'book_desc',
        'book_img'
    );

    public function publisher()
    {
        return $this->belongsTo(PublishersModel::class, 'book_publisher_id', 'publisher_id');
    }
    protected static function imageUpload($id, $data)
    {
        $books = self::find($id);

        if ($books->book_img) {
            Storage::delete($books->book_img);
        }

        if ($data) {
            if ($data) {
                $path = $data->store('/book_pictures', 'public');
                if ($path) {
                    Log::info("File stored successfully at: " . $path);
                } else {
                    Log::error("Failed to store file.");
                }
                $books->book_img = $path;
            }
            $path = $data->store('/book_pictures');
            $books->book_img = $path;
        }


        $books->save();
    }

    protected static function imageDelete($id)
    {
        $books = self::find($id);

        if ($books->book_img) {
            Storage::delete($books->book_img);
        }
    }
    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'book_category_id', 'category_id');
    }


    public function author()
    {
        return $this->belongsTo(AuthorModel::class, 'book_author_id', 'author_id');
    }

    protected $casts = array(
        'book_id' => 'string'
    );

    protected static function readBooks()
    {
        $data = self::all();
        return $data;
    }


    protected static function createBook($data)
    {
        return self::create($data);
    }

    protected static function updateBook($id, $data)
    {
        $publishers = self::find($id);
        if ($publishers) {
            $publishers->update($data);
            return $publishers;
        }
        return null;
    }

    protected static function readBookById($id)
    {
        $publishers = self::find($id);

        return $publishers;
    }

    protected static function deleteBook($id)
    {
        return self::destroy($id);
    }
}
