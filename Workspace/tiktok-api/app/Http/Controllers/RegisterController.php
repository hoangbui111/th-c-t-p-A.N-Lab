<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
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
            'password' => 'required|min:6|confirmed'
        ]);

        // Tạo tài khoản người dùng mới
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
           // Đăng ký vai trò "admin" cho tài khoản mới tạo
           if ($request->input('role') === 'admin') {
            $user->role = 'admin';
        } else {
            $user->role = 'user';
        }
   
        // Lưu thông tin tài khoản vào cơ sở dữ liệu
        $user->save();

        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user);
        // Chuyển hướng đến trang "Main" (hoặc bất kỳ trang nào bạn muốn)
        return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }
}
