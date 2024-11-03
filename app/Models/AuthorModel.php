<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'author_id';
    protected $fillable = array(
        'author_id',
        'author_name',
        'author_description',
        'created_at',
        'updated_at'
    );
    protected $casts = array(
        'author_id' => 'string',
    );

    protected static function readAuthors ()
    {
        $data = self::all(); 
        return $data; 
    } 

    protected static function createAuthors($data)
    {
        return self::create($data);
    }

    protected static function updateAuthors ($id, $data)
    {
        $author = self::find($id);
        if ($author) {
            $author->update($data);
            return $author;
        }
        return null;
    }

    protected static function readAuthorById ($id)
    {
        $author = self::find($id);

        return $author;
    }

    protected static function deleteAuthor($id)
    {
        return self::destroy($id);
    }
}
