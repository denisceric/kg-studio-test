<?php

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

Route::get('/', 'AppController@index')->name('index');



Auth::routes(['verify' => false, 'register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quotes', 'HomeController@quotes')->name('quotes');
Route::get('/customers', 'HomeController@customers')->name('customers');
Route::get('/settings', 'HomeController@settings')->name('settings');
Route::post('/scheduler', 'HomeController@scheduler')->name('scheduler');

Route::get('/unsubscribe', 'CustomerController@unsubscribe')->name('unsubscribe');
Route::get('/verified', 'CustomerController@verified')->name('verified');
Route::get('/status-change', 'CustomerController@statusChange')->name('statuschange');

Route::group(['middleware' => ['auth']], function () { 
    Route::post('/get-quotes', 'QuoteController@index');
    Route::post('/add-quote', 'QuoteController@store');
    Route::post('/delete-quote', 'QuoteController@destroy');
    Route::post('/action', 'CustomerController@actions');
});