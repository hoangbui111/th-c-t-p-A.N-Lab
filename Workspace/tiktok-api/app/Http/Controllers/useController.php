<?php

namespace App\Http\Controllers;         

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
  

    //
    public function registerUser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fullname' => 'required|max:255',
        'username' => 'required',
        'password' => 'required|min:6|confirmed',
        'gender'   => 'required',
        'email'    => 'required|email',
        'address'  => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('register')
            ->withErrors($validator)
            ->withInput();
    } else {
        // Lưu thông tin vào database
        $fullname = $request->input('fullname');
        $username = $request->input('username');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $address = $request->input('address');

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'fullname' => $fullname,
            'username' => $username,
            'password' => bcrypt($password),
            'gender'   => $gender,
            'email'    => $email,
            'address'  => $address,
        ]);

        return redirect('register')
            ->with('message', 'Đăng ký thành công.');
    }
}
} 
