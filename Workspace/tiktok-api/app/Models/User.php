<?php

namespace App\Models; // Add the correct namespace for the User model

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        // Check if the user has the 'admin' role
        return $this->roles->contains(function ($role) {
            return $role->name === 'admin';
        });
    }

    // Phương thức kiểm tra xem người dùng có vai trò "user" hay không
    public function isUser()
    {
        // Check if the user has the 'user' role
        return $this->roles->contains(function ($role) {
            return $role->name === 'user';
        });
    }
}
