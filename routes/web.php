<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LapakUMKMController;
use App\Http\Controllers\LodgerController;
use App\Http\Controllers\MabourController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Auth;
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




// Auth Route (Login and Register)
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

// Disable Default Auth from Laravel UI Auth
Route::get('/login', [HomeController::class, 'disableDefaultAuth']);
Route::get('/register', [HomeController::class, 'disableDefaultAuth']);


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/lodger', [LoginController::class, 'showLodgerLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/lodger', [RegisterController::class, 'showLodgerRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('login.admin');
Route::post('/login/lodger', [LoginController::class, 'lodgerLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/lodger', [RegisterController::class, 'createLodger']);


// Middleware Admin
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Wisatas
    Route::get('/admin/wisatas', [WisataController::class, 'index'])->name('admin.wisatas');
    Route::get('/admin/wisatas/create', [WisataController::class, 'create'])->name('wisatas.create');
    Route::post('/admin/wisatas/store', [WisataController::class, 'store'])->name('wisatas.store');

    // Penginapans
    Route::get('/admin/penginapans', [PenginapanController::class, 'index'])->name('admin.penginapans');

    // Penginapans
    Route::get('/admin/lapakumkms', [LapakUMKMController::class, 'index'])->name('admin.lapakumkms');

    // Penginapans
    Route::get('/admin/mabours', [MabourController::class, 'index'])->name('admin.mabours');
});

// Middleware Lodger
Route::group(['middleware' => 'auth:lodger'], function () {

    Route::get('/lodger', [LodgerController::class, 'show'])->name('lodger');
});

Route::get('logout', [LoginController::class, 'logout']);
Route::get('logout', [LoginController::class, 'logout']);



// MAIN ROUTE
// Wisatas
Route::get('/wisatas', [WisataController::class, 'index'])->name('wisatas');
Route::get('/wisatas/{wisata:slug}', [WisataController::class, 'show']);


// Sekk
Route::get('/penginapans', [PenginapanController::class, 'index']);
Route::get('/lapakumkms', [LapakUMKMController::class, 'index']);
Route::get('/mabours', [MabourController::class, 'index']);
