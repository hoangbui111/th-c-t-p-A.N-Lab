<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Đăng ký tài khoản'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:user,admin', // Thêm dấu phẩy sau confirmed
        ]);

        // Tạo tài khoản người dùng mới
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Sử dụng Hash::make() để băm mật khẩu
            'role' => $request->role,
        ]);
        // Lưu thông tin tài khoản vào cơ sở dữ liệu    
        $user->save();

        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user); // Đăng nhập người dùng sau khi đăng ký thành công
     // Chuyển hướng đến trang đăng nhập
    return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
}
}