<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notelp',
        'user_password',
        'user_level'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function register($data)
    {
        return self::create($data);
    }

    protected static function upload_profile($id, $data)
    {
        $user = self::find($id);

        // Delete the old picture if it exists
        if ($user->user_pict_url) {
            Storage::delete($user->user_pict_url);
        }

        // Save new image and set path
        if ($data) {
            if ($data) {
                $path = $data->store('/profile_pictures', 'public');
                if ($path) {
                    Log::info("File stored successfully at: " . $path);
                } else {
                    Log::error("Failed to store file.");
                }
                $user->user_pict_url = $path;
            }
            $path = $data->store('/profile_pictures');
            $user->user_pict_url = $path;
        }

        $user->save();
    }
}
