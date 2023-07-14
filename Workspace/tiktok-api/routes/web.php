<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('Profile');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
Route::put('/update-profile', 'ProfileController@update')->name('profile.update');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');






