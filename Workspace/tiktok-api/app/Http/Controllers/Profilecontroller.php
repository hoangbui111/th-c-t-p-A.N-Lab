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
        $userId = Auth::id(); 
        $user = User::find($userId); 

        return view('profile')->with('user', $user);
    }

    public function update(Request $request)
    {
        $userId = Auth::id(); 
        $user = User::find($userId); 

        
        if (!$user) {
            return redirect('/profile')->with('error', 'Người dùng không tồn tại.');
        }

        
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'address' => 'nullable',
            'bio' => 'nullable',
            'hobby' => 'nullable',
        ]);

      
        if ($validator->fails()) {
            return redirect('/profile')->withErrors($validator)->withInput();
        }

      
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->birthdate = $request->input('birthdate');
        $user->address = $request->input('address');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect('/profile')->with('success', 'Hồ sơ đã được cập nhật.');
    }
}
