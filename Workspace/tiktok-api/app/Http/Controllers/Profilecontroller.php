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
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập

        // Validate dữ liệu được gửi từ form
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'address' => 'nullable',
            'bio' => 'nullable',
            'hobby' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
