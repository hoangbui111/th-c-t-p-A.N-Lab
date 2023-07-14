<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
    public function index()
    {
        $users = DB::select('select * form users where active = ?', [1]);
        return view('user.index', ['users'=> $users]);
    }
}


