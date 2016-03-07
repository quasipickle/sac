<?php
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'StaticPagesController@home')->name('home');
	Route::get('adminhome', 'AdminController@home')->name('adminhome');
	Route::get('admin', 'AdminController@base');
	Route::get('rooms', 'RoomsController@show')->name('show_rooms');
	Route::get('add_rooms', 'RoomsController@create')->name('add_room');
	Route::post('store_room', 'RoomsController@store')->name('store');
	Route::delete('delete_room/{id}', 'RoomsController@destroy')->name('delete_room');
	Route::put('changeAvaliability/{id}', 'RoomsController@changeAvaliability')->name('changeAvaliability');
	Route::get('/admin/presentations', 'AdminController@view_presentations')->name('presentations');
	Route::get('/admin/courses', 'AdminController@view_courses')->name('courses');

    Route::auth();
	Route::patch('presentation/{id}/submit', 'PresentationsController@submit')
		->name('submit_presentation');
	Route::resource('presentation', 'PresentationsController',
		['except' => 'show']);

	Route::get('/new_role', 'UsersController@request_new_role')
	      ->name('new_role');
	Route::resource('user', 'UsersController', ['only' => 'show']);

	Route::group(['prefix' => 'professor/my'], function () {
    	Route::get('courses', 'UsersController@my_courses')->
    		name('my_courses');
		Route::post('add', 'UsersController@add_course')->
			name('add_course');
		Route::post('remove/{id}', 'UsersController@remove_course')->
			name('remove_course');
	});
});
