<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(1); // Thay đổi số 1 thành ID của người dùng cần hiển thị thông tin

        return view('profile')->with('user', $user);
    }

    public function update(Request $request)
    {   
        User::truncate();
        $user = new User(); // Lấy thông tin người dùng đang đăng nhập
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->birthdate = $request->input('birthdate');
        $user->address = $request->input('address');
        $user->bio = $request->input('bio');
        // Validate dữ liệu được gửi từ form
        // $validator = Validator::make($request->all(), [
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'birthdate' => 'required|date',
        //     'address' => 'nullable',
        //     'bio' => 'nullable',
        //     'hobby' => 'nullable',
        // ]);
        $user->save();
        return redirect('/profile')->with('success', 'Hồ sơ đã được cập nhật.');
    }
}
