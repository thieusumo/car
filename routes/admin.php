<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('admin.home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	//Pages
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
	//Profile
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	//Car
	Route::resource('car', 'CarController', ['except' => ['show']]);
	Route::group(['prefix' => 'car'], function () {
		Route::post('/import','CarController@import')->name('car.import');
		Route::get('/datatable','CarController@datatable')->name('car.datatable');
		Route::get('/down-template','CarController@getDownload')->name('car.down-template');
		// Route::patch('ok', function(){
		// 	return request()->all();
		// })->name('ok');
	});
	//Route Car
	Route::resource('route','RouteController',['except' => ['show']]);
	Route::group(['prefix' => 'route'], function() {
		Route::get('/datatable','RouteController@datatable')->name('route.datatable');
	});
	//Car Images
	Route::resource('images','ImageController',['only' => ['show','store','destroy','create']]);

});