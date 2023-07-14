<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable',
            'bio' => 'nullable',
            'hobby' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
        } else {
            $avatarPath = null;
        }
        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'avatar' => $avatarPath,
            'address' => $request->input('address'),
            'bio' => $request->input('bio'),
        ]);   
        
            
        return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }   
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile')->with('success', 'Đăng nhập thành công!');
        } else {
            return redirect('/login')->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
        }
    }

    

public function showProfile()
{
    // Lấy người dùng từ CSDL
    $user = User::find(1); // Thay đổi 1 thành ID người dùng cần lấy thông tin

    // Kiểm tra xem người dùng có tồn tại hay không
    if (!$user) {
        abort(404, "Người dùng không tồn tại");
    }

    // Truyền biến $user vào view profile.index
    return view('profile.index', ['user' => $user]);
}
}