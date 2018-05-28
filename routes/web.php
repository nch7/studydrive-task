<?php

Route::get('/confirm/{token}', 'AuthController@confirm');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'AuthController@index')->name('login');
    Route::post('/', 'AuthController@submit');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index');
    });
});

