<?
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Kiểm tra quyền truy cập xem thông tin người dùng cụ thể
        if (Gate::allows('view-user', $user)) {
            // Nếu có quyền, tiếp tục hiển thị thông tin người dùng...
            return view('user.show', compact('user'));
        } else {
            abort(403); // Ngăn truy cập nếu không có quyền
        }
    }
}
