<?php

Route::get('/', 'PageController@index')->name('home');

Route::get('edit','CarController@edit')->name('fronted.car.edit');
Route::post('save','CarController@save')->name('fronted.car.save');

Route::get('{slug}/{car_name?}', 'PageController@page')->name('route');


Route::resource('customer', 'CustomerController');
Route::get('tim-kiem','CarController@search')->name('car.search');





