<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user_registration',[ApiController::class,'user_registration']);


Route::post('delivery',[ApiController::class,'delivery']);
Route::post('restro',[ApiController::class,'restro']);

Route::post('delivery_api',[ApiController::class,'delivery_api']);

Route::get('get_user',[ApiController::class,'get_user']);

Route::get('get_restro',[ApiController::class,'get_restro']);

Route::get('get_delivery',[ApiController::class,'get_delivery']);

Route::get('get_notification',[ApiController::class,'get_notification']);

Route::get('get_maincategory',[ApiController::class,'get_maincategory']);

Route::get('get_city',[ApiController::class,'get_city']);

Route::get('get_slider',[ApiController::class,'get_slider']);

Route::post('update_restro',[ApiController::class,'update_restro']);

Route::post('update_user',[ApiController::class,'update_user']);

Route::get('get_city_restro',[ApiController::class,'get_city_restro']);

Route::get('get_additem',[ApiController::class,'get_additem']);

Route::get('get_restro_by_category',[ApiController::class,'get_restro_by_category']);


Route::get('get_itemjoinname',[ApiController::class,'get_itemjoinname']);

Route::post('send_mobile_verify_otp',[ApiController::class,'send_mobile_verify_otp']);

Route::get('get_search_restro_item',[ApiController::class,'get_search_restro_item']);

Route::get('get_search_restroitem',[ApiController::class,'get_search_restroitem']);

Route::post('image_upload', [Apicontroller::class, 'image_upload']);

Route::get('get_additem_id', [Apicontroller::class, 'get_additem_id']);
//restro post api route
Route::post('post_restrovendor',[Apicontroller::class,'post_restrovendor']);
//additem post api route
Route::post('post_additem',[Apicontroller::class,'post_additem']);

Route::post('post_card',[ApiController::class,'post_card']);

Route::post('post_order',[ApiController::class,'post_order']);

Route::get('remove_cart',[ApiController::class,'remove_cart']);

Route::get('get_cart',[ApiController::class,'get_cart']);

Route::get('get_order',[ApiController::class,'get_order']);
Route::get('get_coupon',[ApiController::class,'get_coupon']);
Route::get('get_card_details',[ApiController::class,'get_card_details']);
Route::get('get_history_card_order',[ApiController::class,'get_history_card_order']);
Route::get('get_byorderid_card_order',[ApiController::class,'get_byorderid_card_order']);

Route::post('post_orderapi',[ApiController::class,'post_orderapi']);
Route::get('get_order_history',[ApiController::class,'get_order_history']);
