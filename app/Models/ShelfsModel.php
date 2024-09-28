<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelfsModel extends Model
{
    use HasFactory;

    protected $table = 'shelfs';
    protected $primaryKey = 'shelf_id';
    protected $fillable = array(
        'shelf_id',
        'shelf_name',
        'shelf_position',
        'created_at',
        'updated_at'
    );
    protected $casts = array(
        'shelf_id' => 'string',
    );
}
