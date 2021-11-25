<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DeliveryManController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;



Route::get('/', [HomeController::class, 'index'])->name('Home.index');

//ADMIN SECTION

Route::get('/admin', [AdminController::class, 'index'])->name('adminlogin.index');
Route::post('/admin', [AdminController::class, 'auth'])->name('adminlogin.auth');

Route::group(['middleware' => 'adminmiddleware'], function () {
    Route::get('/adminhome', [AdminController::class, 'home'])->name('admin.dashboard');
    Route::get('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

// Delivery Man
    Route::get('/admindeliveryman',[DeliveryManController::class,'index'])->name('admin.deliveryman');
    Route::get('/admindeliveryman/manage',[DeliveryManController::class,'add'])->name('admin.managedeliveryman');
    Route::post('/admindeliveryman/manage',[DeliveryManController::class,'store'])->name('admin.managedeliverymanstore');
    Route::get('/admindeliveryman/edit',[DeliveryManController::class,'edit'])->name('admin.managedeliverymanedit');
    Route::get('/admindeliveryman/edit',[DeliveryManController::class,'editprocess'])->name('admin.managedeliverymaneditprocess');


});



//----->>>>


Route::get('/Gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/ContactUs', [ContactUsController::class, 'index'])->name('contact.index');

Route::get('/Login', [UserLoginController::class, 'index'])->name('userLogin.index');

Route::get('/Logout', [UserLoginController::class, 'logout'])->name('user.logout');

Route::get('/User/profile', [UserLoginController::class, 'profile'])->name('user.profile');

Route::post('/Login', [UserLoginController::class, 'auth'])->name('userLogin.auth');

Route::get('/SignUp', [UserRegisterController::class, 'index'])->name('userRegister.index');

Route::post('/SignUp', [UserRegisterController::class, 'store'])->name('userRegister.store');
