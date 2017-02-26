<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('providers', 'ProvidersController@index');

Route::get('providers/{provider}', 'ProvidersController@dash');

Route::get('providers/{provider}/users', 'UsersController@show');

Route::post('providers/{provider}/users/store', 'UsersController@store');

Route::get('providers/{provider}/users/create', 'UsersController@create');

Route::get('users/{user}/edit', 'UsersController@edit');

Route::patch('users/{user}', 'UsersController@update');
