<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('login', [LoginController::class, 'index'])->name('login');  
Route::post('/login', [LoginController::class, 'login']);
Route::get('/main', [MainController::class, 'index'])->name('main');

#Menu
Route::get('add', [MenuController::class, 'create'])->name('menus.add');
Route::post('add', [MenuController::class, 'store'])->name('menus.store');
Route::get('list', [MenuController::class, 'index'])->name('menus.list');              
Route::get('/menus/edit/{id}', [MenuController::class, 'show'])->name('menus.show');
Route::post('/menus/edit/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menus/destroy{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

#product
Route::prefix('product')->group(function () {
    Route::get('add', [ProductController::class, 'create']);
});
#upload 
Route::post('upload/Service', [UploadController::class, 'store']);