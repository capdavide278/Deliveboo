<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/restaurants', 'Api\RestaurantController@index')->name('api.restaurants.index');
Route::get('/restaurants/search', 'Api\RestaurantController@search')->name('api.restaurants.search');

Route::get('/restaurants/{restaurant}', 'Api\restaurantController@show')->name('api.restaurant.show');

Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});

Route::get('products', 'Admin\ProductController@index');
Route::get('orders/generate', 'Admin\TransactionController@generate');
Route::post('orders/make/payment', 'Admin\TransactionController@makePayment');