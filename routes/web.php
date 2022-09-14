<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Dit wordt de landingpage
Route::get('/', [HomeController::class, 'index']
)->name('home');

Route::get('/greeting', function() {
    return 'hello world';
});

//Handle User routes
Route::resource('users', UserController::class);
Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//Handle Post routes
Route::resource('posts', PostController::class);

Route::get('/profile/{user}', [UserProfileController::class, 'showUserProfile'])->name('profile');

Route::get('/moderator', [ModeratorController::class, 'showAllUsers'])->name('moderator');

