<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    // Your model code here...

    // Factory method
    public static function factory()
    {
        return new \Database\Factories\PostsFactory();
    }
}