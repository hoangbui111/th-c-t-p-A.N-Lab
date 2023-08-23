<?php
 use App\Http\Controllers\RegisterController;
 use App\Http\Controllers\LoginController;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\MainController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\MenuController;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Route;

 Route::get('/register', [RegisterController::class, 'index'])->name('register');
 Route::post('/register', [RegisterController::class, 'store']);
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Chỉ thay đổi tên phương thức
 Route::post('/login', [LoginController::class, 'login']);
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

 Route::middleware(['guest'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage_users');
    // ... Các route khác liên quan đến admin
});


 #product
 Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
   Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
   Route::get('/products/create', [UserController::class, 'create'])->name('user.product.create');
   Route::post('/products/store', [UserController::class, 'store'])->name('user.product.store');
   Route::get('/products/index', [UserController::class, 'index'])->name('user.product.index');
   Route::delete('/products/destroy/{productId}', [UserController::class, 'destroy'])->name('user.product.destroy');
   Route::get('/products/edit/{productId}', [UserController::class, 'edit'])->name('user.product.edit');
   Route::put('/products/eidt/{productId}', [UserController::class, 'update'])->name('user.product.update');
});
 


   #Menu
   Route::prefix('menus')->group(function () {
Route::get('add', [MenuController::class, 'create'])->name('menus.add');
Route::post('add', [MenuController::class, 'store'])->name('menus.store');
Route::get('list', [MenuController::class, 'index'])->name('menus.list');              
Route::get('/edit/{id}', [MenuController::class, 'show'])->name('menus.show');
Route::post('/edit/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/destroy{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
   });




