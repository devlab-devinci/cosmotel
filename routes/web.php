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

Route::post('/register', [
	'as' => 'register.register',
	'uses' => 'Auth\RegisterController@register'
]);

Route::get('/register/{type}', [
	'as' => 'register.show',
	'uses' => 'Auth\RegisterController@showRegisterForm'
]);

Route::get('/restaurateur', [
	'as' => 'restaurateur',
	'uses' => 'RestaurateurController@index'
]);

Route::get('/influencer', [
	'as' => 'influencer',
	'uses' => 'InfluencerController@index'
]);