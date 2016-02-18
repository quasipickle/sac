<?php
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'StaticPagesController@home')->name('home');
    Route::auth();
	Route::resource('presentation', 'PresentationsController',
		['except' => 'show']);
	Route::post('/presentation/{id}/submit', 'PresentationsController@submit')
	Route::resource('user', 'UsersController');
});
