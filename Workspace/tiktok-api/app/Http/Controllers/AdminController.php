<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); // Sử dụng middleware 'admin' để kiểm tra quyền truy cập
    }

    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

public function manageUsers()
{
    $users = User::all();
    return view('admin_manage_users', ['users' => $users]);
}
}