<?php
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'StaticPagesController@home')->name('home');
    Route::auth();

    Route::resource('presentation', 'PresentationsController',
        ['except' => 'show']);
    Route::group(['prefix' => 'presentation'], function (){
        Route::patch('{id}/submit', 'PresentationsController@submit')->
            name('presentation.submit');
        Route::patch('{id}/approve', 'PresentationsController@approve')->
            name('presentation.approve');
        Route::patch('{id}/decline', 'PresentationsController@decline')->
            name('presentation.decline');
        Route::patch('{id}/review', 'PresentationsController@review')->
            name('presentation.review');
    });

    Route::get('/new_role', 'UsersController@request_new_role')->
        name('new_role');
    Route::resource('user', 'UsersController', ['only' => 'show']);

    Route::resource('room', 'RoomsController');

    Route::group(['prefix' => 'admin'], function () {
        Route::put('changeAvailability/{id}', 'RoomsController@changeAvailability')->
            name('changeAvailability');
        Route::get('courses', 'AdminController@view_courses')->name('courses');
        Route::get('requests', 'AdminController@show_requests')->name('requests');
        Route::get('approve_request/{id}', 'AdminController@approve_request')->
            name('approve_request');
        Route::get('decline_request/{id}', 'AdminController@decline_request')->
            name('decline_request');
        // Route::get('presentations', 'AdminController@view_presentations')
        //  ->name('presentations');
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
