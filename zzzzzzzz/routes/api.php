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


