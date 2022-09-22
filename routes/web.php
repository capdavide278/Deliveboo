<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')
   ->namespace('Admin')
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
        Route::get('/', 'AdminController@index')->name('home');
        Route::resource('restaurant', 'RestaurantController');
        Route::resource('dish', 'DishController');

   });

//per gestire le rotte di vue eliminiamo la rotta principale della home in alto e mettiamo questo
   Route::get("{any?}", function(){
      return view('welcome');
      })->where("any", ".*")->name('welcome');
