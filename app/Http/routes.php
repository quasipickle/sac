<?php
Route::get('/', 'StaticPagesController@home');
Route::get('signup', 'UsersController@create');
Route::post('welcome', 'UsersController@store');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
