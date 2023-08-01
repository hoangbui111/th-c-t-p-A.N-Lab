<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;    

use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
   
   
    
    public function login(Request $request)
    {
        // Xác thực người dùng
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Kiểm tra quyền truy cập vào trang phù hợp dựa vào vai trò
            if (Gate::allows('view-admin-dashboard')) {
                // Nếu có quyền admin, chuyển hướng đến trang 'main' cho admin
                return redirect()->route('main');
            } else if (Gate::allows('view-user-dashboard')) {
                // Nếu có quyền người dùng thông thường, chuyển hướng đến trang 'user-dashboard' cho người dùng thông thường
                return redirect()->route('user-dashboard');
            } else {
                // Nếu không có quyền, hiển thị thông báo lỗi hoặc chuyển hướng đến trang đăng nhập với thông báo lỗi
                Auth::logout(); // Đăng xuất người dùng nếu không có quyền
                return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập vào trang phù hợp.');
            }
        } else {
            // Xác thực thất bại, hiển thị thông báo lỗi hoặc chuyển hướng đến trang đăng nhập với thông báo lỗi
            return redirect()->route('login')->with('error', 'Thông tin đăng nhập không đúng.');
        }
    }
} 
   
    
    
    
    
    
