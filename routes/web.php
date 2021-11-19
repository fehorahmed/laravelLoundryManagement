<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;


Route::get('/', function () {
    return view('main_site.index');
});


Route::get('/Gallery',[GalleryController::class,'index'])->name('gallery.index');

Route::get('/ContactUs',[ContactUsController::class,'index'])->name('contact.index');

Route::get('/Login',[UserLoginController::class,'index'])->name('userLogin.index');

Route::get('/Login',[UserLoginController::class,'index'])->name('userLogin.index');

Route::get('/SignUp',[UserRegisterController::class,'index'])->name('userRegister.index');
Route::post('/SignUp',[UserRegisterController::class,'store'])->name('userRegister.store');