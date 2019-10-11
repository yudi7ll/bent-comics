<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function() {
    Route::prefix('/user')->group(function () {
        Route::get('/', function (Request $request) {
            return $request->user();
        });
        Route::put('/', 'ProfileController@update');
        Route::post('/picture', 'ProfileController@updatePicture');
        Route::delete('/picture', 'ProfileController@deleteProfilePicture');

    });

    // Rented
    Route::prefix('/rent')->group(function () {
        Route::get('/', 'RentedController@get'); // get all data
        Route::get('/{id}', 'RentedController@getOne'); // get one data
        Route::post('/', 'RentedController@store');
        Route::put('/{id}', 'RentedController@update');
        Route::delete('/', 'RentedController@destroy');
    });

    // Comic
    Route::prefix('/comic')->group(function () {
        Route::get('/', 'ComicController@index');
        Route::get('/{id}', 'ComicController@show');
        Route::post('/', 'ComicController@store');
        Route::put('/{id}', 'ComicController@update');
        Route::delete('/{id}', 'ComicController@destroy');
    });
});
