<?php

Route::get('/home', function() {
  return redirect('/');
});

Auth::routes();

Route::get('/', function() {
  return redirect('/admin');
});

// Admin routes
Route::get('/admin/{path?}', 'AdminController@index')->where('path', '.*');

Route::get('/logout', function() {
  \Auth::logout();
  return redirect('/');
})->name('logout');
