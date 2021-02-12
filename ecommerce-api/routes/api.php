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

Route::get('/', function() {
    return 'Laravel - API Ecommerce';
});


// Products Routes
Route::post('/products', 'App\Http\Controllers\ProductController@store');
Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::put('/products/{product}', 'App\Http\Controllers\ProductController@update');


// PaymentType Routes
Route::put('/payment-types/{paymentType}', 'App\Http\Controllers\PaymentTypeController@update');
Route::get('/payment-types', 'App\Http\Controllers\PaymentTypeController@index');
Route::post('/payment-types', 'App\Http\Controllers\PaymentTypeController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
