<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('users', UserController::class);

Route::get('login', [UserController::class, 'login'])->name('users.login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/greeting', function() {
    return 'hello world';
});