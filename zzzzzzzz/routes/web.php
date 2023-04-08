<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\citycontroller;
use App\Http\Controllers\maincategorycontroller;
use App\Http\Controllers\restrovendorcontroller;
use App\Http\Controllers\itemmastercontroller;
use App\Http\Controllers\vendorregistrationcontroller;
use App\Http\Controllers\deliveryboycontroller;
use App\Http\Controllers\internalnotificationcontroller;
use App\Http\Controllers\assignitemcontroller;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\AdditemController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AssignareaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;

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

Route::get('/', function () {
    return view('welcome');
});


//login
Route::get('login',[UserController::class,'index'])->name('login');
Route::post('login_submit',[UserController::class,'check_login'])->name('login_submit');
Route::get('logout',[UserController::class,'log_out'])->name('logout');
 
Route::get('/',[citycontroller::class,'index'])->name('city');
Route::post('create-city',[citycontroller::class,'create'])->name('create-city');
Route::get('edit-city/{id}',[citycontroller::class,'edit'])->name('edit-city');
Route::post('update-city',[citycontroller::class,'update'])->name('update-city');
Route::get('destroy-city/{id}',[citycontroller::class,'destroy'])->name('destroy-city');

//main_category
Route::get('maincategory',[maincategorycontroller::class,'index'])->name('maincategory');
Route::post('main_category',[maincategorycontroller::class,'create'])->name('main_category');
Route::get('edit_main/{id}',[maincategorycontroller::class,'edit'])->name('edit_main');
Route::post('update-main',[maincategorycontroller::class,'update'])->name('update-main');
Route::get('destroy-main/{id}',[maincategorycontroller::class,'destroy'])->name('destroy-main');

//restro_vendor
Route::get('restro',[restrovendorcontroller::class,'index'])->name('restro');
Route::post('restro_vendor',[restrovendorcontroller::class,'create'])->name('restro_vendor');
Route::get('destroy-restro/{id}',[restrovendorcontroller::class,'destroy'])->name('destroy-restro');

//item_master
Route::get('item',[itemmastercontroller::class,'index'])->name('item');
Route::post('item_master',[itemmastercontroller::class,'create'])->name('item_master');
Route::get('destroy-item/{id}',[itemmastercontroller::class,'destroy'])->name('destroy-item');

//vendor_registration
Route::get('vendor',[vendorregistrationcontroller::class,'index'])->name('vendor');
Route::post('vendor_registration',[vendorregistrationcontroller::class,'create'])->name('vendor_registration');
Route::get('destroy-vendor/{id}',[vendorregistrationcontroller::class,'destroy'])->name('destroy-vendor');

//delivery_boy
Route::get('delivery',[deliveryboycontroller::class,'index'])->name('delivery');
Route::post('delivery_boy',[deliveryboycontroller::class,'create'])->name('delivery_boy');
Route::get('destroy-delivery/{id}',[deliveryboycontroller::class,'destroy'])->name('destroy-delivery');

//internal_notification
Route::get('internal',[internalnotificationcontroller::class,'index'])->name('internal');
Route::post('internal_notification',[internalnotificationcontroller::class,'create'])->name('internal_notification');
Route::get('destroy-internal/{id}',[internalnotificationcontroller::class,'destroy'])->name('destroy-internal');

//assign_item
Route::get('assign',[assignitemcontroller::class,'index'])->name('assign');
Route::post('assign_item',[assignitemcontroller::class,'create'])->name('assign_item');
Route::get('destroy-assign/{id}',[assignitemcontroller::class,'destroy'])->name('destroy-assign');

//coupon
Route::get('coupon',[CouponController::class,'index'])->name('coupon');
Route::post('create_coupon',[CouponController::class,'create'])->name('create_coupon');
Route::get('destroy-coupon/{id}',[CouponController::class,'destroy'])->name('destroy-coupon');

//additem
Route::get('additem',[AdditemController::class,'index'])->name('additem');
Route::post('create_additem',[AdditemController::class,'create'])->name('create_additem');
Route::get('destroy-additem/{id}',[AdditemController::class,'destroy'])->name('destroy-additem');


//area
Route::get('area',[AreaController::class,'index'])->name('area');
Route::post('create_area',[AreaController::class,'create'])->name('create_area');
Route::get('edit-area/{id}',[citycontroller::class,'edit'])->name('edit-area');
Route::put('update-area',[citycontroller::class,'update'])->name('update-area');
Route::get('destroy-area/{id}',[AreaController::class,'destroy'])->name('destroy-area');

//assignarea
Route::get('assignarea',[AssignareaController::class,'index'])->name('assignarea');
Route::post('create_assignarea',[AssignareaController::class,'create'])->name('create_assignarea');
Route::get('destroy-assignarea/{id}',[AssignareaController::class,'destroy'])->name('destroy-assignarea');


//slider
Route::get('slider',[SliderController::class,'index'])->name('slider');
Route::post('create_slider',[SliderController::class,'create'])->name('create_slider');
Route::get('destroy-slider/{id}',[SliderController::class,'destroy'])->name('destroy-slider');

