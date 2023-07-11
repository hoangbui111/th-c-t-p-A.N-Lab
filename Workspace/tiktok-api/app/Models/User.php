<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = ['fullname', 'username', 'password', 'gender', 'email', 'address'];
}
