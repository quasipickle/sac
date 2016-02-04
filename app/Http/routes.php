<?php
Route::get('/', 'StaticPagesController@home');
Route::get('signup', 'UsersController@create');
Route::post('welcome', 'UsersController@store');
