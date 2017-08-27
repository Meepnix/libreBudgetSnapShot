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


/*
// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Removed Registration

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


Route::get('providers', 'ProvidersController@index');

Route::get('providers/{provider}/users', 'ProvidersUsersController@show')->name('providers.users.show');

Route::post('providers/{provider}/users/store', 'ProvidersUsersController@store');

Route::get('providers/{provider}/users/create', 'ProvidersUsersController@create')->name('providers.users.create');

Route::get('providers/{provider}/users/edit/{user}', 'ProvidersUsersController@edit')->name('providers.users.edit');

Route::patch('providers/{provider}/users/{user}', 'ProvidersUsersController@update');

Route::delete('providers/{provider}/users/{user}', 'ProvidersUsersController@destroy')->name('providers.users.delete');

Route::get('users/edit/{user}', 'UsersController@edit')->name('users.edit');
