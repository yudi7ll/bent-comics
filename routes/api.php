<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function() {
  Route::get('/user', function (Request $request) {
	return $request->user();
  });
  Route::get('/user/check/{key}', 'ProfileController@check');
  Route::put('/user', 'ProfileController@update');

  // Rented
  Route::get('/rent', 'RentedController@get'); // get all data
  Route::get('/rent/{id}', 'RentedController@getOne'); // get one data
  Route::post('/rent', 'RentedController@store');
  Route::put('/rent/{id}', 'RentedController@update');
  Route::delete('/rent', 'RentedController@destroy');

});


// for testing
Route::get('/api_token', function(Request $request) {
  return response()->json(\App\User::where('email', $request->email)->first('api_token'));
});
