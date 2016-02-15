<?php
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'StaticPagesController@home');
    Route::auth();
	Route::get('/presentation/new', 'PresentationsController@create');
});
