<?php
Route::get('/', 'StaticPagesController@home');


Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/presentation/new', 'PresentationsController@create');

    Route::get('/home', 'HomeController@index');
});
