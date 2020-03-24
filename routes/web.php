<?php

Route::get('/', 'PageController@index')->name('home');

Route::get('{slug}/{car_name?}', 'PageController@page')->name('route');


Route::resource('customer', 'CustomerController');
// //Car
// Route::group(['prefix'=>'loai-xe'],function(){
// 	Route::resource('chi-tiet', 'CarController');
// });
//search car
Route::get('tim-kiem','CarController@search')->name('car.search');





