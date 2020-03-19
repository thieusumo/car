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
Route::get('{slug}/{car_name?}', 'PageController@page')->name('route');

Route::group(['prefix'=>'{slug}/{car_name?}'],function(){
	Route::get('/datatable@PageController@datatable')->name('car_type.datatable');
});

Route::resource('customer', 'CustomerController');
// //Car
// Route::group(['prefix'=>'loai-xe'],function(){
// 	Route::resource('chi-tiet', 'CarController');
// });
//search car
Route::get('tim-kiem','CarController@search')->name('car.search');





