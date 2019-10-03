<?php

use Illuminate\Http\Request;

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

Route::get('/get-customers', 'CustomerController@index');
Route::post('/add-customer', 'CustomerController@store');
Route::post('/customer-paid', 'CustomerController@payment');
Route::post('/payment-status', 'CustomerController@paymentStatus');
Route::post('/customer-status', 'CustomerController@customerStatus');
Route::post('/reactivation', 'CustomerController@reactivate');

