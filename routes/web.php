<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DeliveryManController;
use App\Http\Controllers\admin\ServiceProductController;
use App\Http\Controllers\admin\ViewOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DeliveryManSelfController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;

Route::get('/', [HomeController::class, 'index'])->name('Home.index');

//ADMIN SECTION

Route::get('/admin', [AdminController::class, 'index'])->name('adminlogin.index')->middleware('adminloginMiddleware');
Route::post('/admin', [AdminController::class, 'auth'])->name('adminlogin.auth');

Route::group(['middleware' => 'adminmiddleware'], function () {
    Route::get('/adminhome', [AdminController::class, 'home'])->name('admin.dashboard');
    Route::get('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

// Delivery Man
    Route::get('/admindeliveryman',[DeliveryManController::class,'index'])->name('admin.deliveryman');
    Route::get('/admindeliveryman/manage',[DeliveryManController::class,'add'])->name('admin.managedeliveryman');
    Route::post('/admindeliveryman/manage',[DeliveryManController::class,'store'])->name('admin.managedeliverymanstore');
    Route::get('/admindeliveryman/edit/{id}',[DeliveryManController::class,'edit'])->name('admin.managedeliverymanedit');
    Route::post('/admindeliveryman/edit',[DeliveryManController::class,'editprocess'])->name('admin.deliveryman.editprocess');
    Route::get('deliveryman.datatable',[DeliveryManController::class,'deliveryManDatatable'])->name('admin.deliveryman.datatable');

    //SERVICE PRODUCT
    Route::get('/admin/serviceproduct',[ServiceProductController::class,'index'])->name('admin.serviceproduct');
    Route::get('/admin/serviceproduct/manage',[ServiceProductController::class,'add'])->name('admin.manage.serviceproduct');
    Route::post('/admin/serviceproduct/manage',[ServiceProductController::class,'store'])->name('admin.manage.serviceproduct.store');
    Route::get('/admin/serviceproduct/edit/{id}',[ServiceProductController::class,'edit'])->name('admin.manage.serviceproduct.edit');
    Route::post('/admin/serviceproduct/edit',[ServiceProductController::class,'editprocess'])->name('admin.serviceproduct.editprocess');
    
    //ORDER VIEW AND ASSIGN DELIVERY MAN   
    Route::get('/admin/orderview',[ViewOrderController::class,'index'])->name('admin.orderview');
    Route::get('/admin/orderview/manage/{id}',[ViewOrderController::class,'adddeliveryman'])->name('admin.add.deliveryman');
    Route::post('/admin/orderview/manage',[ViewOrderController::class,'store'])->name('admin.add.deliveryman.store');
    Route::get('/admin/orderview/edit/{id}',[ViewOrderController::class,'edit'])->name('admin.add.deliveryman.edit');
    Route::post('/admin/orderview/edit',[ViewOrderController::class,'editprocess'])->name('admin.add.deliveryman.editprocess');
    
});

//----->>>>

//Customer Order Section


//----->>>>

Route::get('/Gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/ContactUs', [ContactUsController::class, 'index'])->name('contact.index');


Route::get('/Logout', [UserLoginController::class, 'logout'])->name('user.logout');


// Redirect to Log in...
Route::get('/User/profile', [UserLoginController::class, 'profile'])->name('user.profile')->middleware('userMiddleware');

Route::get('/Order', [PlaceOrderController::class,'index'])->name('order.index')->middleware('userMiddleware');
Route::post('/orderproces',[PlaceOrderController::class, 'store'])->name('order.store');

Route::get('/viewOrder',[PlaceOrderController::class,'vieworder'])->name('view.order')->middleware('userMiddleware');

// userloginMiddleware For redirect profile, if user login.
Route::get('/Login', [UserLoginController::class, 'index'])->name('userLogin.index')->middleware('userloginMiddleware');
Route::post('/Login', [UserLoginController::class, 'auth'])->name('userLogin.auth');

Route::get('/SignUp', [UserRegisterController::class, 'index'])->name('userRegister.index');

Route::post('/SignUp', [UserRegisterController::class, 'store'])->name('userRegister.store');
Route::get('/useredit', [UserRegisterController::class, 'useredit'])->name('user.edit');
Route::post('/usereditprocess', [UserRegisterController::class, 'usereditprocess'])->name('useredit.process');


//Delivery Man Options

Route::get('/delivery/login',[DeliveryManSelfController::class,'index'])->name('deliveryman.index');
Route::post('/delivery/login/process',[DeliveryManSelfController::class,'login'])->name('deliveryman.login');
Route::get('/delivery/logout',[DeliveryManSelfController::class,'logout'])->name('delivery.logout');

Route::get('/delivery/home',[DeliveryManSelfController::class,'home'])->name('deliveryman.home');

