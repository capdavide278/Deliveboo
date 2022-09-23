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
Route::get('/category/restaurants', 'Api\RestaurantController@searchCat')->name('api.restaurants.restaurants');

Route::get('/restaurants/{restaurant}', 'Api\restaurantController@show')->name('api.restaurant.show');

Route::get('products', 'Api\Products\ProductController@index');
Route::get('orders/generate', 'Api\Orders\OrderController@generate');
Route::post('orders/make/payment', 'Api\Orders\OrderController@makePayment');
Route::post('/transaction', 'Api\TransactionController@store');
