<?php
Route::get('/', 'StaticPagesController@home');
Route::get('signup', 'UsersController@create');
