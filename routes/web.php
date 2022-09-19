<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\UserProfileController;
use App\Models\Category;

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


//Landingpage
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

//View a user's profile route
Route::get('/profile/{user}', [UserProfileController::class, 'showUserProfile'])->name('profile');

//Moderator routes
Route::prefix('moderator')->group(function() {
    Route::get('/users', [ModeratorController::class, 'showAllUsers'])->name('moderator.users');
    Route::put('/users/{user}', [ModeratorController::class, 'changeUserStatus'])->name('moderator.user-management');
    Route::get('/users/handle-permissions',[ModeratorController::class, 'showUsersModStatus'])->name('moderator.mod-permissions');
    Route::put('/users/grant-permissions/{user}', [ModeratorController::class, 'handlePermissions'])->name('moderator.handle-permissions');
});

//Categories routes
Route::prefix('categories')->group(function() {
    Route::get('/{selectedCategory}',[CategoryController::class, 'showByCategory'])->name('show-category-posts');
});
