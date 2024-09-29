<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishersModel extends Model
{
    use HasFactory;

    protected $table = 'publishers';
    protected $primaryKey = 'publisher_id';
    protected $fillable = array(
        'publisher_id', 'publisher_name', 'publisher_addr', 'publisher_phone' ,'publisher_email'
    );
    protected $casts = array(
        'publisher_id' => 'string'
    );

    protected static function readPublishers ()
    {
        $data = self::all(); 
        return $data; 
    } 

    
    protected static function createPublishers ($data)
    {
        return self::create($data);
    }

    protected static function updatePublishers ($id, $data)
    {
        $publishers = self::find($id);
        if ($publishers) {
            $publishers->update($data);
            return $publishers;
        }
        return null;
    }

    protected static function readPublisherById ($id)
    {
        $publishers = self::find($id);

        return $publishers;
    }

    protected static function deletePublisher($id)
    {
        return self::destroy($id);
    }

}
