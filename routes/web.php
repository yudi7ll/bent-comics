<?php

Route::get('/home', function() {
  return redirect('/');
});

Auth::routes();

/*
 * FOR NOW
 */
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function() {
  return redirect('/admin');
});

// Admin routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/index2', 'AdminController@index2')->name('index2');
Route::get('/logout', function() {
  \Auth::logout();
  return redirect('/');
})->name('logout');

// TODO: ADMIN PANEL
