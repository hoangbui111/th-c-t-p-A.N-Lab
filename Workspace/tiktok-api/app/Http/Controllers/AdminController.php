<?php
namespace App\Http\Controllers;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin_dashboard'); // Chỉnh sửa đúng đường dẫn của view
    }
    
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    public function manageUsers()
    {
        $users = User::all();
        return view('admin_manage_users', ['users' => $users]); // Chỉnh sửa đúng tên biến
    }
}
