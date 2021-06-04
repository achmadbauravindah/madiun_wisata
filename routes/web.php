<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\GaleriwisataController;
use App\Http\Controllers\LapakUMKMController;
use App\Http\Controllers\LodgerController;
use App\Http\Controllers\MabourController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\WisataController;
use App\Http\Requests\Penginapan;
use App\Models\Lodger;
use Illuminate\Database\Capsule\Manager;
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
// Disable Default Auth from Laravel UI Auth
Route::get('/login', [HomeController::class, 'disableDefaultAuth']);
Route::get('/register', [HomeController::class, 'disableDefaultAuth']);

// Admin
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('showAdminLoginForm');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
// Lodger
Route::get('/lodger/login', [LoginController::class, 'showLodgerLoginForm'])->name('showLodgerLoginForm');
Route::get('/lodger/register', [RegisterController::class, 'showLodgerRegisterForm'])->name('showLodgerRegisterForm');
Route::post('/lodger/login', [LoginController::class, 'lodgerLogin'])->name('lodger.login');
Route::post('/lodger/register', [RegisterController::class, 'createLodger'])->name('lodger.register');
// Manager
Route::get('/manager/login', [LoginController::class, 'showManagerLoginForm'])->name('showManagerLoginForm');
Route::post('/manager/login', [LoginController::class, 'managerLogin'])->name('login.lodger');
// Seller
Route::get('/seller/login', [LoginController::class, 'showSellerLoginForm'])->name('showSellerLoginForm');
Route::get('/seller/register', [RegisterController::class, 'showSellerRegisterForm'])->name('showSellerRegisterForm');
Route::post('/seller/login', [LoginController::class, 'sellerLogin'])->name('login.seller');
Route::post('/seller/register', [RegisterController::class, 'createSeller'])->name('register.seller');
// All Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Akses Admin
Route::group(['middleware' => 'auth:admin'], function () {
    // index
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // wisatas
    Route::get('/admin/wisatas', [WisataController::class, 'indexAdmin'])->name('admin.wisatas');
    Route::get('/admin/wisatas/create', [WisataController::class, 'create'])->name('wisatas.create');
    Route::post('/admin/wisatas/store', [WisataController::class, 'store'])->name('wisatas.store');
    Route::get('/admin/wisatas/{wisata:slug}/edit', [WisataController::class, 'edit'])->name('wisatas.edit');
    Route::patch('/admin/wisatas/{wisata:slug}/update', [WisataController::class, 'update'])->name('wisatas.update');
    Route::delete('/admin/wisatas/{wisata:slug}/delete', [WisataController::class, 'destroy'])->name('wisatas.delete');
    // galeriwisatas for wisatas
    Route::patch('/admin/galeriwisatas/{galeriwisata:id}/update', [GaleriwisataController::class, 'update'])->name('galeriwisatas.update');
    Route::delete('/admin/galeriwisatas/{galeriwisata:id}/delete', [GaleriwisataController::class, 'destroy'])->name('galeriwisatas.delete');
    // penginapans
    Route::get('/admin/penginapans', [PenginapanController::class, 'indexAdmin'])->name('admin.penginapans');
    Route::get('/admin/penginapans/{penginapan:slug}/show', [PenginapanController::class, 'showAdmin'])->name('admin.penginapans.show');
    Route::patch('/admin/penginapans/{penginapan:slug}/verification', [PenginapanController::class, 'verification'])->name('admin.penginapans.verification');
    // lapakumkms
    Route::get('/admin/lapakumkms', [LapakUMKMController::class, 'index'])->name('admin.lapakumkms');
    Route::get('/admin/lapakumkms', [LapakUMKMController::class, 'index'])->name('admin.lapakumkms');
    // mabours
    Route::get('/admin/mabours', [MabourController::class, 'indexAdmin'])->name('admin.mabours');
    Route::get('/admin/mabours/edit', [MabourController::class, 'edit'])->name('mabours.edit');
    Route::post('/admin/tours/store', [TourController::class, 'store'])->name('tours.store');
    Route::put('/admin/tours/update/{id}', [TourController::class, 'updateAndDelete'])->name('tours.update');
    Route::post('/admin/buses/store', [BusController::class, 'store'])->name('buses.store');
    Route::put('/admin/buses/update/{id}', [BusController::class, 'updateAndDelete'])->name('buses.update');
    // Manage Account
    // lodger
    Route::get('/admin/manage-lodger', [LodgerController::class, 'indexAdmin'])->name('manage-lodger');
    Route::get('/admin/manage-lodger/{lodger:id}/show', [LodgerController::class, 'showAdmin'])->name('manage-lodger.show');
    Route::delete('/admin/manage-lodger/{lodger:id}/delete', [LodgerController::class, 'destroy'])->name('manage-lodger.delete');
    // manager
    Route::get('/manager/register', [RegisterController::class, 'showManagerRegisterForm'])->name('showManagerRegisterForm');
    Route::post('/manager/register', [RegisterController::class, 'createManager'])->name('register.lodger');
    Route::delete('/manager/delete', [Manager::class, 'destroy'])->name('manager.delete');
});


// Akses Lodger
Route::group(['middleware' => 'auth:lodger'], function () {
    Route::get('/lodger', [LodgerController::class, 'index'])->name('lodger');
    Route::get('/lodger/edit', [LodgerController::class, 'edit'])->name('lodger.edit');
    Route::patch('/lodger/update', [LodgerController::class, 'update'])->name('lodger.update');
    // penginapans
    Route::get('/lodger/penginapans', [PenginapanController::class, 'indexLodger'])->name('lodger.penginapans');
    Route::get('/lodger/penginapans/create', [PenginapanController::class, 'create'])->name('penginapans.create');
    Route::post('/lodger/penginapans/store', [PenginapanController::class, 'store'])->name('penginapans.store');
    Route::get('/lodger/penginapans/{penginapan:slug}/edit', [PenginapanController::class, 'edit'])->name('penginapans.edit');
    Route::patch('/lodger/penginapans/{penginapan:slug}/update', [PenginapanController::class, 'update'])->name('penginapans.update');
    Route::delete('/lodger/penginapans/{penginapan:slug}/delete', [PenginapanController::class, 'destroy'])->name('penginapans.delete');
});



// USER ACCESS

// home
Route::get('/', [HomeController::class, 'index'])->name('home');
// wisatas
Route::get('/wisatas', [WisataController::class, 'index'])->name('wisatas');
Route::get('/wisatas/{wisata:slug}', [WisataController::class, 'show'])->name('wisatas.show');
// penginapans
Route::get('/penginapans', [PenginapanController::class, 'index'])->name('penginapans');
Route::get('/penginapans/{penginapan:slug}', [PenginapanController::class, 'show'])->name('penginapans.show');
// lapakumkms
Route::get('/lapakumkms', [LapakUMKMController::class, 'index'])->name('lapakumkms');
// mabours
Route::get('/mabours', [MabourController::class, 'index'])->name('mabours');
