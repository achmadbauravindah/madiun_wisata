<?php

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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/blogger', [LoginController::class, 'showBloggerLoginForm']);
Route::get('/login/lodger', [LoginController::class, 'showLodgerLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/blogger', [RegisterController::class, 'showBloggerRegisterForm']);
Route::get('/register/lodger', [RegisterController::class, 'showLodgerRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/blogger', [LoginController::class, 'bloggerLogin']);
Route::post('/login/lodger', [LoginController::class, 'lodgerLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/blogger', [RegisterController::class, 'createBlogger']);
Route::post('/register/lodger', [RegisterController::class, 'createLodger']);

// Middleware Blogger
Route::group(['middleware' => 'auth:blogger'], function () {
    Route::view('/blogger', 'blogger');
});

// Middleware Admin
Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/admin', 'admin');
});

// Middleware Lodger
Route::group(['middleware' => 'auth:lodger'], function () {

    Route::view('/lodger', 'lodger');
});

Route::get('logout', [LoginController::class, 'logout']);
