<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DeliveryManController;
use App\Http\Controllers\admin\DistrictController;
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
use Illuminate\Routing\RouteGroup;

Route::get('/', [HomeController::class, 'index'])->name('Home.index');

//ADMIN SECTION

Route::get('/admin', [AdminController::class, 'index'])->name('adminlogin.index')->middleware('adminloginMiddleware');
Route::post('/admin', [AdminController::class, 'auth'])->name('adminlogin.auth');

Route::group(['middleware' => 'adminmiddleware'], function () {
    Route::get('/adminhome', [AdminController::class, 'home'])->name('admin.dashboard');
    Route::get('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

    // Delivery Man
    Route::get('/admindeliveryman', [DeliveryManController::class, 'index'])->name('admin.deliveryman');
    Route::get('/admindeliveryman/manage', [DeliveryManController::class, 'add'])->name('admin.managedeliveryman');
    Route::post('/admindeliveryman/manage', [DeliveryManController::class, 'store'])->name('admin.managedeliverymanstore');
    Route::get('/admindeliveryman/edit/{id}', [DeliveryManController::class, 'edit'])->name('admin.managedeliverymanedit');
    Route::post('/admindeliveryman/edit', [DeliveryManController::class, 'editprocess'])->name('admin.deliveryman.editprocess');
    Route::get('deliveryman.datatable', [DeliveryManController::class, 'deliveryManDatatable'])->name('admin.deliveryman.datatable');

    //SERVICE PRODUCT
    Route::get('/admin/serviceproduct', [ServiceProductController::class, 'index'])->name('admin.serviceproduct');
    Route::get('/admin/serviceproduct/manage', [ServiceProductController::class, 'add'])->name('admin.manage.serviceproduct');
    Route::post('/admin/serviceproduct/manage', [ServiceProductController::class, 'store'])->name('admin.manage.serviceproduct.store');
    Route::get('/admin/serviceproduct/edit/{id}', [ServiceProductController::class, 'edit'])->name('admin.manage.serviceproduct.edit');
    Route::post('/admin/serviceproduct/edit', [ServiceProductController::class, 'editprocess'])->name('admin.serviceproduct.editprocess');

    //DISTRICT SECTION
    Route::get('/admin/district', [DistrictController::class, 'index'])->name('admin.district');
    Route::get('/admin/district/manage', [DistrictController::class, 'add'])->name('admin.manage.district');
    Route::post('/admin/district/manage', [DistrictController::class, 'store'])->name('admin.manage.district.store');
    Route::get('/admin/district/edit/{id}', [DistrictController::class, 'edit'])->name('admin.manage.district.edit');
    Route::post('/admin/district/edit', [DistrictController::class, 'editprocess'])->name('admin.district.editprocess');
    Route::get('/admin/district/delete/{id}', [DistrictController::class, 'delete'])->name('admin.manage.district.delete');


    //ORDER VIEW AND ASSIGN DELIVERY MAN
    Route::get('/admin/orderview', [ViewOrderController::class, 'index'])->name('admin.orderview');
    Route::get('/admin/orderview/manage/{id}', [ViewOrderController::class, 'adddeliveryman'])->name('admin.add.deliveryman');
    Route::post('/admin/orderview/manage', [ViewOrderController::class, 'store'])->name('admin.add.deliveryman.store');

    //VIEW WITH DELIVERY MAN
    Route::get('/admin/orderview_with_dm', [ViewOrderController::class, 'view_with_dm'])->name('admin.orderview_with_dm');
    Route::get('/admin/orderview_with_dm/manage/{id}', [ViewOrderController::class, 'edit_deliveryman'])->name('admin.edit.deliveryman_with_dm');
    Route::post('/admin/orderview_with_dm/manage', [ViewOrderController::class, 'edit_deliveryman_store'])->name('admin.edit.deliveryman.store');

    //order_recived_from_dm
    Route::get('/admin/order_recived_from_dm', [ViewOrderController::class, 'order_recived_from_dm'])->name('admin.order_recived_from_dm');
    Route::get('/admin/recived_product_from_dm/{id}', [ViewOrderController::class, 'recived_product_from_dm'])->name('admin.recived_product_from_dm');

    //Assign Second Delivery Man
    Route::post('/admin/assign_second_delivery_man', [ViewOrderController::class, 'assign_second_delivery_man'])->name('admin.assign_second_delivery_man');


    //Contact Message
    Route::get('admin/contact/message', [ContactUsController::class, 'showMessage'])->name('contact.message');

    //askmalkmcmdc
    Route::get('/admin/orderview/edit/{id}', [ViewOrderController::class, 'edit'])->name('admin.add.deliveryman.edit');
    Route::post('/admin/orderview/edit', [ViewOrderController::class, 'editprocess'])->name('admin.add.deliveryman.editprocess');
});

//----->>>>

//Customer Order Section


//----->>>>

Route::get('/Gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/ContactUs', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('/ContactUs/store', [ContactUsController::class, 'messageStore'])->name('contact.messageStore');


Route::get('/Logout', [UserLoginController::class, 'logout'])->name('user.logout');


// Redirect to Log in...
Route::group(['middleware' => 'userMiddleware'], function () {

    Route::get('/User/profile', [UserLoginController::class, 'profile'])->name('user.profile');

    Route::get('/Order', [PlaceOrderController::class, 'index'])->name('order.index');
    Route::post('/orderproces', [PlaceOrderController::class, 'store'])->name('order.store');
    Route::get('/useredit', [UserRegisterController::class, 'useredit'])->name('user.edit');
    Route::post('/usereditprocess', [UserRegisterController::class, 'usereditprocess'])->name('useredit.process');
    //CUSTOMER VIEW ORDER
    Route::get('/viewOrder', [PlaceOrderController::class, 'vieworder'])->name('view.order');
});

// userloginMiddleware For redirect profile, if user login.
Route::get('/Login', [UserLoginController::class, 'index'])->name('userLogin.index')->middleware('userloginMiddleware');
Route::post('/Login', [UserLoginController::class, 'auth'])->name('userLogin.auth');

Route::get('/SignUp', [UserRegisterController::class, 'index'])->name('userRegister.index')->middleware('userloginMiddleware');

Route::post('/SignUp', [UserRegisterController::class, 'store'])->name('userRegister.store');



//Delivery Man Options

Route::get('/delivery/login', [DeliveryManSelfController::class, 'index'])->name('deliveryman.index');
Route::post('/delivery/login/process', [DeliveryManSelfController::class, 'login'])->name('deliveryman.login');
Route::get('/delivery/logout', [DeliveryManSelfController::class, 'logout'])->name('delivery.logout');



Route::group(['middleware' => 'deliverymanself'], function () {
    Route::get('/delivery/home', [DeliveryManSelfController::class, 'home'])->name('deliveryman.home');
    Route::get('/delivery/recived_by_d/{id}', [DeliveryManSelfController::class, 'recived_by_d'])->name('recived_by_d');
    //OTP
    Route::get('/delivery/otp/view/{id}', [DeliveryManSelfController::class, 'otpView'])->name('deliveryman.otpview');
    Route::post('/delivery/otp/process', [DeliveryManSelfController::class, 'otpViewProcess'])->name('deliveryman.otpprocess');
    //History
    Route::get('/delivery/history', [DeliveryManSelfController::class, 'history'])->name('deliveryman.history');

});
