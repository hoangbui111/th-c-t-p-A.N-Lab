<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user_dashboard');
    }
  
public function __construct()
    {
        $this->middleware('auth'); // Sử dụng middleware 'auth'
    }

    // ...

        public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit_profile', ['user' => $user]);
    }
    }

