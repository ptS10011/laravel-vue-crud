<?php

//SPA App route
Route::get('/', function () {
    return view('app');
});


// Get All Users
Route::get('users', 'UserController@index');

// Get single user
Route::get('users/{id}', 'UserController@single');

// Add new user
Route::post('users', 'UserController@store');

// Update User
Route::put('users/{id}', 'UserController@update');

// Delete User
Route::delete('users/{id}', 'UserController@destroy');
