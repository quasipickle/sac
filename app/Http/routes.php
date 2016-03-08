<?php
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'StaticPagesController@home')->name('home');
	Route::auth();

	Route::patch('presentation/{id}/submit', 'PresentationsController@submit')
		->name('submit_presentation');
	Route::resource('presentation', 'PresentationsController',
		['except' => 'show']);

	Route::get('/new_role', 'UsersController@request_new_role')->
		name('new_role');
	Route::resource('user', 'UsersController', ['only' => 'show']);

	Route::resource('room', 'RoomsController');
	Route::group(['prefix' => 'admin'], function () {
		Route::put('changeAvailability/{id}', 'RoomsController@changeAvailability')->
			name('changeAvailability');
		Route::get('presentations', 'PresentationsController@view_presentations_admin')
	       ->name('presentations');
		Route::get('approve_presentation/{id}',
		 	'PresentationsController@approve_presentation')->
			name('approve_presentation');
		Route::get('decline_presentation/{id}', 
			'PresentationsController@decline_presentation')
		     ->name('decline_presentation');
		Route::get('review_presentation/{id}', 
			'PresentationsController@review_presentation')
		     ->name('review_presentation');
		Route::get('courses', 'AdminController@view_courses')->name('courses');
		Route::get('requests', 'AdminController@show_requests')->name('requests');
		Route::get('approve_request/{id}', 'AdminController@approve_request')->
			name('approve_request');
		Route::get('decline_request/{id}', 'AdminController@decline_request')->
			name('decline_request');
		// Route::get('presentations', 'AdminController@view_presentations')
		// 	->name('presentations');
		Route::get('courses', 'AdminController@view_courses')->name('courses');		
	});

	Route::group(['prefix' => 'professor/my'], function () {
    	Route::get('courses', 'UsersController@my_courses')->
    		name('my_courses');
		Route::post('add', 'UsersController@add_course')->
			name('add_course');
		Route::post('remove/{id}', 'UsersController@remove_course')->
			name('remove_course');
	});
});
