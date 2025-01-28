<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageUser extends Model
{
    use HasFactory;
    protected $table = 'manage_users';
    protected $fillable = [
      'username',
        'fullname',
        'email',
        'password',
        'address',
        'contact',
        'user_type',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = bcrypt($user->password); // Hash password
        });
    }
}
