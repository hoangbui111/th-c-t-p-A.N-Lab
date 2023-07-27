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
        // Kiểm tra thông tin đăng nhập từ người dùng
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Kiểm tra quyền truy cập xem trang "Main"
            if (Gate::allows('view', 'main')) {
                // Nếu có quyền, chuyển hướng đến trang "Main"
                return redirect()->route('main');
            } else {
                // Nếu không có quyền, hiển thị thông báo lỗi
                return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập vào trang "Main".');
            }
        } else {
            // Xác thực thất bại, hiển thị thông báo lỗi hoặc chuyển hướng đến trang đăng nhập với thông báo lỗi
            return redirect()->route('login')->with('error', 'Thông tin đăng nhập không đúng.');
        }
    }
}
