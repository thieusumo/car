<?php

//Customer's Auth
Route::post('/registry','AuthController@registry')->name('frontend.registry');
Route::post('/login','AuthController@login')->name('frontend.login');
Route::get('/logout','AuthController@logout')->name('frontend.logout');

//Customer's Rating
Route::post('/rating','CarController@rating')->name('frontend.customer.rating');
//Customer's Question
Route::post('/question','CarController@question')->name('frontend.customer.send_question');

Route::get('/', 'PageController@index')->name('home');

Route::get('edit','CarController@edit')->name('fronted.car.edit');
Route::post('save','CarController@save')->name('fronted.car.save');

Route::get('tim-kiem','CarController@search')->name('car.search');
Route::get('tuyen/{slug}/{car_name?}', 'PageController@page')->name('route');


Route::resource('customer', 'CustomerController');





