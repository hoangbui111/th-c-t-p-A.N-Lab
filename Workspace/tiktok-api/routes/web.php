<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Đây là nơi bạn có thể đăng ký các tuyến đường web cho ứng dụng của bạn. 
| Các tuyến đường này được tải bởi RouteServiceProvider trong một nhóm chứa
| middleware nhóm "web". Bây giờ hãy tạo ra một cái gì đó tuyệt vời!
*/
Route::get('/', [UserController::class, 'index']);










 

