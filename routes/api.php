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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('/email/verify/{id}/{hash}', 'AuthController@verify')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
    });
});

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
      'middleware' => ['auth:api','IsAdmin']
    ], function() {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('sellers', 'AdminController@all_sellers');
        Route::get('buyers', 'AdminController@all_buyers');
        Route::post('add_category', 'AdminController@add_category');
        Route::get('categories', 'AdminController@show_categories');
    });
});

Route::group([
    'prefix' => 'seller'
], function () {
    Route::group([
      'middleware' => ['auth:api','IsSeller']
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'prefix' => 'buyer'
], function () {  
    Route::group([
      'middleware' => ['auth:api','IsBuyer']
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});