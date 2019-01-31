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

Route::get('/restaurateur', [
	'as' => 'restaurateur',
	'uses' => 'RestaurateurController@index'
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
    Route::get('/{id}', [
        'as' => 'influencer.show',
        'uses' => 'UserController@show'
    ]);

    Route::get('/{id}/edit', [
        'as' => 'influencer.edit',
        'uses' => 'UserController@edit'
    ]);

    Route::put('/{id}', [
        'as' => 'influencer.update',
        'uses' => 'UserController@update'
    ]);
});

Route::group(
    [
        'prefix' => 'restaurant',
        'as' => 'restaurant::',
    ], function() {
    /*Route::post('/getOne', [
        'as' => 'getOne',
        'uses' => 'RestaurantController@getOne'
    ]);*/
    Route::get('/getOne/{id}', [
        'as' => 'getOne',
        'uses' => 'RestaurantController@getOne'
    ]);
});

Route::group(
    [
        'prefix'     => 'restaurateur',
        'as'         => 'restaurateur.',
        'middleware' => 'is.restaurateur',
    ], function () {
        Route::get('/dashboard', [
            'as' => 'dashboard',
            'uses' => 'RestaurateurController@dashboard'
        ]);

    	Route::get('/{id}', [
			'as' => 'show',
			'uses' => 'UserController@show'
		]);

		Route::get('/{id}/edit', [
			'as' => 'edit',
			'uses' => 'UserController@edit'
		]);

		Route::put('/{id}', [
			'as' => 'update',
			'uses' => 'UserController@update'
		]);

		Route::get('restaurant/create', [
            'as' => 'restaurant::create',
            'uses' => 'RestaurantController@create'
        ]);

        Route::post('restaurant/create', [
            'as' => 'restaurant::store',
            'uses' => 'RestaurantController@store'
        ]);

        Route::post('restaurant/addProducts', [
        'as' => 'product::store',
        'uses' => 'ProductController@store'
        ]);

        Route::post('restaurant/addOpenings', [
            'as' => 'opening::store',
            'uses' => 'OpeningController@store'
        ]);

        Route::post('restaurant/addDiscount', [
            'as' => 'discount::store',
            'uses' => 'DiscountController@store'
        ]);
});


Route::get('/restaurants', [
	'as' => 'restaurants',
	'uses' => 'RestaurantController@index'
]);

Route::get('/reservations', [
	'as' => 'reservations',
	'uses' => 'UserController@reservations'
]);










