<?php
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'StaticPagesController@home')->name('home');
    Route::auth();
	Route::resource('presentation', 'PresentationsController');
});
