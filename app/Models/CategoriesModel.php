<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = array(
        'category_id', 
        'category_name'
    );

    protected $casts = array(
        'category_id' => 'string'
    );

    protected static function readCategories ()
    {
        $data = self::all(); 
        return $data; 
    } 

    protected static function createCategory($data)
    {
        return self::create($data);
    }

    protected static function updateCategory ($id, $data)
    {
        $category = self::find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    protected static function readCategoryById ($id)
    {
        $category = self::find($id);

        return $category;
    }

    protected static function deleteCategory($id)
    {
        return self::destroy($id);
    }
}
