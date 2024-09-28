<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryUsersModel extends Model
{
    use HasFactory;
      
    protected $table = 'library-users';
    protected $primaryKey = 'library_user_id';
    protected $fillable = array(
        'library_user_id',
        'library_user_firstname',
        'library_user_lastname',
        'library_user_username',
        'library_user_email',
        'library_user_password',
        'library_user_isAdmin',
        'created_at',
        'updated_at'
    );
    protected $casts = array(
        'library_user_id' => 'string',
    );
}
