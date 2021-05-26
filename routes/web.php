<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriwisataController;
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
Auth::routes();


// AUTHENTICATION

// Disable Default Auth from Laravel UI Auth
Route::get('/login', [HomeController::class, 'disableDefaultAuth']);
Route::get('/register', [HomeController::class, 'disableDefaultAuth']);
// Form
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('showAdminLoginForm');
Route::get('/login/lodger', [LoginController::class, 'showLodgerLoginForm'])->name('showLodgerLoginForm');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])->name('showAdminRegisterForm');
Route::get('/register/lodger', [RegisterController::class, 'showLodgerRegisterForm'])->name('showLodgerRegisterForm');
// Logic
Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('login.admin');
Route::post('/login/lodger', [LoginController::class, 'lodgerLogin'])->name('login.lodger');
Route::post('/register/admin', [RegisterController::class, 'createAdmin'])->name('register.admin');
Route::post('/register/lodger', [RegisterController::class, 'createLodger'])->name('register.lodger');
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); //LOGOUT


// MIDDLEWARE

// MIDDLEWARE ADMIN
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // wisatas
    Route::get('/wisatas/create', [WisataController::class, 'create'])->name('wisatas.create');
    Route::post('/wisatas/store', [WisataController::class, 'store'])->name('wisatas.store');
    Route::get('/wisatas/{wisata:slug}/edit', [WisataController::class, 'edit'])->name('wisatas.edit');
    Route::patch('/wisatas/{wisata:slug}/update', [WisataController::class, 'update'])->name('wisatas.update');
    Route::delete('/wisatas/{wisata:slug}/delete', [WisataController::class, 'destroy'])->name('wisatas.delete');

    // galeriwisatas
    Route::patch('/galeriwisatas/{galeriwisata:id}/update', [GaleriwisataController::class, 'update'])->name('galeriwisatas.update');
    Route::delete('/galeriwisatas/{galeriwisata:id}/delete', [GaleriwisataController::class, 'destroy'])->name('galeriwisatas.delete');

    // lapakumkms
    Route::get('/lapakumkms', [LapakUMKMController::class, 'index'])->name('admin.lapakumkms');

    // mabours
    Route::get('/mabours', [MabourController::class, 'index'])->name('admin.mabours');
});


// MIDDLEWARE LODGER

Route::group(['middleware' => 'auth:admin,lodger'], function () {
    // penginapans
    Route::get('/penginapans/create', [PenginapanController::class, 'create'])->name('penginapans.create');
    Route::post('/penginapans/store', [PenginapanController::class, 'store'])->name('penginapans.store');
    Route::get('/penginapans/{penginapan:slug}/edit', [PenginapanController::class, 'edit'])->name('penginapans.edit');
    Route::patch('/penginapans/{penginapan:slug}/update', [PenginapanController::class, 'update'])->name('penginapans.update');
    Route::delete('/penginapans/{penginapan:slug}/delete', [PenginapanController::class, 'destroy'])->name('penginapans.delete');
});

// MIDDLEWARE LODGER

Route::group(['middleware' => 'auth:lodger'], function () {
    Route::get('/lodger', [LodgerController::class, 'show'])->name('lodger');
});


// MAIN ROUTE

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// WISATAS
Route::get('/wisatas', [WisataController::class, 'index'])->name('wisatas');
Route::get('/wisatas/{wisata:slug}', [WisataController::class, 'show'])->name('wisatas.show');

// PENGINAPAN
Route::get('/penginapans', [PenginapanController::class, 'index'])->name('penginapans');
Route::get('/penginapans/{penginapan:slug}', [PenginapanController::class, 'show'])->name('penginapans.show');


// Sekk
Route::get('/lapakumkms', [LapakUMKMController::class, 'index'])->name('lapakumkms');
Route::get('/mabours', [MabourController::class, 'index'])->name('mabours');
