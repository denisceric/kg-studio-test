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



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quotes', 'HomeController@quotes')->name('quotes');
Route::get('/customers', 'HomeController@customers')->name('customers');
Route::get('/settings', 'HomeController@settings')->name('settings');

Route::get('/unsubscribe', 'CustomerController@unsubscribe')->name('unsubscribe');
