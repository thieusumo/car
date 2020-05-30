<?php

//Customer's Auth
Route::post('/registry','AuthController@registry')->name('frontend.registry');
Route::post('/login','AuthController@login')->name('frontend.login');
Route::get('/logout','AuthController@logout')->name('frontend.logout');

//Customer's Rating
Route::post('/rating','CarController@rating')->name('frontend.customer.rating');
Route::get('/danh-gia/{id_car}','CarController@allRating')->name('frontend.customer.all_rating');
Route::get('/cau-hoi/{id_car}','CarController@allQuestion')->name('frontend.customer.all_question');
//Customer's Question
Route::post('/question','CarController@question')->name('frontend.customer.send_question');
//Customer's Report
Route::post('/report','CarController@report')->name('frontend.customer.report-info');
//Customer's Contact
Route::post('/contact','ContactController@contact')->name('frontend.customer.contact');
//Socialite
Route::get('/auth/redirect/{provider}', 'SocialController@redirect')->name('customer.socialite');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/', 'PageController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::get('edit','CarController@edit')->name('fronted.car.edit');
	Route::post('save','CarController@save')->name('fronted.car.save');
});
Route::get('tim-kiem','CarController@search')->name('car.search');
Route::get('/{slug}/{car_name?}', 'PageController@page')->name('route');


Route::resource('customer', 'CustomerController');





