<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function showLoginForm()
{
    return view('login');
}
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        return redirect()->intended('/dashboard')->with('success', 'Đăng nhập thành công.');
    }

    // Authentication failed
    return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ'])->withInput();
}



    
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|unique:users',
        'password' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'birthdate' => 'required|date',
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
    }

    $avatarPath = $request->file('avatar')->store('avatars', 'public');

    $user = User::create([
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
        'email' => $request->input('email'),
        'birthdate' => $request->input('birthdate'),
        'avatar' => $avatarPath,
    ]);

    return redirect()->route('login')->with('success', 'Registration successful. Please login.');
}

}