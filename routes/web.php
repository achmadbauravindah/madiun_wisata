<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LodgerController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login', [HomeController::class, 'disableDefaultAuth']);
Route::get('/register', [HomeController::class, 'disableDefaultAuth']);


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/lodger', [LoginController::class, 'showLodgerLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/lodger', [RegisterController::class, 'showLodgerRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/lodger', [LoginController::class, 'lodgerLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/lodger', [RegisterController::class, 'createLodger']);


// Middleware Admin
Route::group(['middleware' => 'auth:admin'], function () {

    // Route::view('/admin', 'admin');
    Route::get('/admin', [AdminController::class, 'show'])->name('admin');
});

// Middleware Lodger
Route::group(['middleware' => 'auth:lodger'], function () {

    Route::get('/lodger', [LodgerController::class, 'show'])->name('lodger');
});

Route::get('logout', [LoginController::class, 'logout']);
