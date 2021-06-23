<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\GaleriwisataController;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LapakUMKMController;
use App\Http\Controllers\LodgerController;
use App\Http\Controllers\MabourController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\SellerController;
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
Route::post('/manager/login', [LoginController::class, 'managerLogin'])->name('manager.login');
// Seller
Route::get('/seller/login', [LoginController::class, 'showSellerLoginForm'])->name('showSellerLoginForm');
Route::get('/seller/register', [RegisterController::class, 'showSellerRegisterForm'])->name('showSellerRegisterForm');
Route::post('/seller/login', [LoginController::class, 'sellerLogin'])->name('seller.login');
Route::post('/seller/register', [RegisterController::class, 'createSeller'])->name('seller.register');
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
    Route::get('/admin/lapakumkms', [LapakUMKMController::class, 'indexAdmin'])->name('admin.lapakumkms');
    Route::get('/admin/lapakumkms/create', [LapakUMKMController::class, 'create'])->name('admin.lapakumkms.create');
    Route::post('/admin/lapakumkms/store', [LapakUMKMController::class, 'store'])->name('admin.lapakumkms.store');
    Route::get('/admin/lapakumkms/{lapakumkm:slug}/edit', [LapakUMKMController::class, 'edit'])->name('admin.lapakumkms.edit');
    Route::patch('/admin/lapakumkms/{lapakumkm:slug}/update', [LapakUMKMController::class, 'update'])->name('admin.lapakumkms.update');
    Route::delete('/admin/lapakumkms/{lapakumkm:slug}/delete', [LapakUMKMController::class, 'destroy'])->name('admin.lapakumkms.delete');
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
    Route::get('/admin/manage-manager', [ManagerController::class, 'indexAdmin'])->name('manage-manager');
    Route::get('/admin/manage-manager/{manager:id}/show', [ManagerController::class, 'showAdmin'])->name('manage-manager.show');
    Route::delete('/admin/manage-manager/{manager:id}/delete', [ManagerController::class, 'destroy'])->name('manager.delete');
    Route::get('/admin/manage-manager/register', [ManagerController::class, 'create'])->name('showManagerRegisterForm');
    Route::post('/admin/manage-manager/register', [ManagerController::class, 'store'])->name('manager.register');
});


// Akses Lodger
Route::group(['middleware' => 'auth:lodger'], function () {
    Route::get('/lodger', [PenginapanController::class, 'indexLodger'])->name('lodger');
    Route::get('/lodger/edit', [LodgerController::class, 'edit'])->name('lodger.edit');
    Route::get('/lodger/edit-password', [LodgerController::class, 'editPassword'])->name('lodger.editPassword');
    Route::patch('/lodger/update', [LodgerController::class, 'update'])->name('lodger.update');
    Route::patch('/lodger/update-password', [LodgerController::class, 'updatePassword'])->name('lodger.updatePassword');
    // penginapans
    Route::get('/lodger/penginapans', [PenginapanController::class, 'indexLodger'])->name('lodger.penginapans');
    Route::get('/lodger/penginapans/create', [PenginapanController::class, 'create'])->name('penginapans.create');
    Route::post('/lodger/penginapans/store', [PenginapanController::class, 'store'])->name('penginapans.store');
    Route::get('/lodger/penginapans/{penginapan:slug}/edit', [PenginapanController::class, 'edit'])->name('penginapans.edit');
    Route::patch('/lodger/penginapans/{penginapan:slug}/update', [PenginapanController::class, 'update'])->name('penginapans.update');
    Route::delete('/lodger/penginapans/{penginapan:slug}/delete', [PenginapanController::class, 'destroy'])->name('penginapans.delete');
    Route::post('/lodger/penginapans', [PenginapanController::class, 'searchInLodger'])->name('penginapans.searchInLodger');
});

// Akses Manager
Route::group(['middleware' => 'auth:manager'], function () {
    Route::get('/manager', [KiosController::class, 'indexManager'])->name('manager');
    Route::get('/manager/edit', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::patch('/manager/update', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('/manager/edit-password', [ManagerController::class, 'editPassword'])->name('manager.editPassword');
    Route::patch('/manager/update-password', [ManagerController::class, 'updatePassword'])->name('manager.updatePassword');
    // lapakumkm
    // Route::get('/manager/lapakumkm', [LapakUMKMController::class, 'indexManager'])->name('manager.lapakumkm');
    // Route::get('/manager/lapakumkm/{lapakumkm:slug}/edit', [LapakUMKMController::class, 'edit'])->name('manager.lapakumkm.edit');
    // Route::patch('/manager/lapakumkm/{lapakumkm:slug}/update', [LapakUMKMController::class, 'update'])->name('manager.lapakumkm.update');
    // kioses
    Route::get('/manager/kioses', [KiosController::class, 'indexManager'])->name('manager.kioses');
    Route::get('/manager/kioses/{kios:slug}/show', [KiosController::class, 'showManager'])->name('manager.kioses.show');
    Route::patch('/manager/kioses/{kios:slug}/verification', [KiosController::class, 'verification'])->name('manager.kioses.verification');
    Route::delete('/manager/kioses/{kios:slug}/delete', [KiosController::class, 'destroy'])->name('manager.kioses.delete');
    Route::post('/manager/kioses', [KiosController::class, 'searchInManager'])->name('kioses.searchInManager');
});

// Akses Seller
Route::group(['middleware' => 'auth:seller'], function () {
    Route::get('/seller', [KiosController::class, 'indexSeller'])->name('seller');
    Route::get('/seller/edit', [SellerController::class, 'edit'])->name('seller.edit');
    Route::patch('/seller/update', [SellerController::class, 'update'])->name('seller.update');
    Route::get('/seller/edit-password', [SellerController::class, 'editPassword'])->name('seller.editPassword');
    Route::patch('/seller/update-password', [SellerController::class, 'updatePassword'])->name('seller.updatePassword');
    // kios
    Route::get('/seller/kios', [KiosController::class, 'indexSeller'])->name('seller.kios');
    Route::get('/seller/kios/create', [KiosController::class, 'create'])->name('kios.create');
    Route::post('/seller/kios/store', [KiosController::class, 'store'])->name('kios.store');
    Route::get('/seller/kios/{kios:slug}/edit', [KiosController::class, 'edit'])->name('kios.edit');
    Route::patch('/seller/kios/{kios:slug}/update', [KiosController::class, 'update'])->name('kios.update');
    // menus
    Route::post('/seller/menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::put('/seller/menus/update/{id}', [MenuController::class, 'updateAndDelete'])->name('menus.update');
});


// USER ACCESS

// home
Route::get('/', [HomeController::class, 'index'])->name('home');
// wisatas
Route::get('/wisatas', [WisataController::class, 'index'])->name('wisatas');
Route::get('/wisatas/{wisata:slug}', [WisataController::class, 'show'])->name('wisatas.show');
Route::post('/wisatas', [WisataController::class, 'search'])->name('wisatas.search');
// penginapans
Route::get('/penginapans', [PenginapanController::class, 'index'])->name('penginapans');
Route::get('/penginapans/{penginapan:slug}', [PenginapanController::class, 'show'])->name('penginapans.show');
Route::post('/penginapans', [PenginapanController::class, 'search'])->name('penginapans.search');
// lapakumkms
Route::get('/lapakumkms', [LapakUMKMController::class, 'index'])->name('lapakumkms');
Route::get('/lapakumkms/{lapakumkm:slug}', [LapakUMKMController::class, 'show'])->name('lapakumkms.show');
Route::post('/lapakumkms', [LapakUMKMController::class, 'search'])->name('lapakumkms.search');
// mabours
Route::get('/mabours', [MabourController::class, 'index'])->name('mabours');
