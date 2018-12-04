<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', function() {
	return redirect('/register/influencer');
})->name('register');

Route::get('/login', function() {
	return redirect('/login/influencer');
})->name('login');

Route::post('/register', [
	'as' => 'register.register',
	'uses' => 'Auth\RegisterController@register'
]);

Route::post('/login', [
	'as' => 'login.login',
	'uses' => 'Auth\LoginController@login'
]);

Route::get('/register/{type}', [
	'as' => 'register.show',
	'uses' => 'Auth\RegisterController@showRegisterForm'
]);

Route::get('/login/{type}', [
	'as' => 'login.show',
	'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('/restaurateur', [
	'as' => 'restaurateur',
	'uses' => 'RestaurateurController@index'
]);

Route::get('/influencer', [
	'as' => 'influencer',
	'uses' => 'InfluencerController@index'
]);

Route::get('/{type}/{id}', [
	'as' => 'user.show',
	'uses' => 'UserController@show'
]);

Route::get('/{type}/{id}/edit', [
	'as' => 'user.edit',
	'uses' => 'UserController@edit'
]);

Route::put('/{type}/{id}', [
	'as' => 'user.update',
	'uses' => 'UserController@update'
]);







