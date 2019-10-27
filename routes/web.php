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
Route::get('/', 'PageController@index')->name('home');
Route::get('{slug}', 'PageController@page')->name('route');

Route::resource('customer', 'CustomerController');
Route::get('loai-xe/{type}', 'PageController@carType')->name('car-type');
//Car
Route::resource('chi-tiet', 'CarController');




