<?php

namespace App\Models;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username', 'password', 'email', 'birthdate', 'avatar',
    ];
    
    // Các phương thức và quan hệ trong model User
}
