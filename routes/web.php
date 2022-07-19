<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/users', function () {
//     return view('users');
// });



Route::get('/register', function () {
    // cần tạo 1 file register.blade.php và có form name, email, pw
    return view('register');
});
Route::get('/register-success', function (Request $request) {
    // Nhận dữ liệu và truyền sang cho view request-success.blade.php
    $requestData = $request->all(); // ['name' => gtri, 'email' => gtr, 'password' => gtri]
    return view('register-success', $requestData);
})->name('regis-success');

Route::prefix('admin')->group(function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/users', UsersController::class);
});
