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
	'as' => 'register::show',
	'uses' => 'Auth\RegisterController@showRegisterForm'
]);

Route::get('/login/{type}', [
	'as' => 'login::show',
	'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('/myAccount', [
	'as' => 'myAccount::show',
	'uses' => 'UserController@myAccount'
]);

Route::put('/myAccount', [
	'as' => 'myAccount::update',
	'uses' => 'UserController@myAccountUpdate'
]);

Route::group(
    [
        'as' => 'guest::',
    ], function () {
    	Route::get('/', [
			'as' => 'home',
			'uses' => 'GuestController@index'
		]);

		Route::get('/service', [
			'as' => 'service',
			'uses' => 'GuestController@service'
		]);

		Route::get('/blog', [
			'as' => 'blog',
			'uses' => 'GuestController@blog'
		]);
		Route::get('/contact', [
			'as' => 'contact',
			'uses' => 'GuestController@contact'
		]);
});

Route::group(
    [
        'prefix'     => 'influencer',
        'as'         => 'influencer::',
    ], function () {
    	Route::get('/search', [
			'as' => 'search',
			'uses' => 'InfluencerController@search'
		]);
});

// Route::get('/restaurateur', [
// 	'as' => 'restaurateur',
// 	'uses' => 'RestaurateurController@index'
// ]);

// Route::get('/influencer', [
// 	'as' => 'influencer',
// 	'uses' => 'InfluencerController@index'
// ]);

// //////// RESTAURATEUR
// // Route::get('/restaurateur/{id}', [
// // 	'as' => 'restaurateur.show',
// // 	'uses' => 'UserController@show'
// // ]);


// Route::group(
//     [
//         'prefix'     => 'restaurateur',
//         'as'         => 'restaurateur.',
//     ], function () {
//     	Route::get('/{id}', [
// 			'as' => 'show',
// 			'uses' => 'UserController@show'
// 		]);

// 		Route::get('/{id}/edit', [
// 			'as' => 'edit',
// 			'uses' => 'UserController@edit'
// 		]);

// 		Route::put('/{id}', [
// 			'as' => 'update',
// 			'uses' => 'UserController@update'
// 		]);
// });





// /////// INFLUENCER
// Route::get('/influencer/{id}', [
// 	'as' => 'influencer.show',
// 	'uses' => 'UserController@show'
// ]);

// Route::get('/influencer/{id}/edit', [
// 	'as' => 'influencer.edit',
// 	'uses' => 'UserController@edit'
// ]);

// Route::put('/influencer/{id}', [
// 	'as' => 'influencer.update',
// 	'uses' => 'UserController@update'
// ]);


// /////

// Route::get('/restaurants', [
// 	'as' => 'restaurants',
// 	'uses' => 'RestaurantController@index'
// ]);

// Route::get('/messages', [
// 	'as' => 'messages',
// 	'uses' => 'UserController@messages'
// ]);

// Route::get('/reservations', [
// 	'as' => 'reservations',
// 	'uses' => 'UserController@reservations'
// ]);









