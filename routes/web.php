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

// WEB
Route::get('/', 'WebController@index');
//Route::get('/my_account', 'AccountController@showMyAccount')->middleware('auth');
Route::get('/my_account/{user}', 'Web\AccountController@showMyAccount');

// CARTS
Route::resource('carts', 'Crud\CartController');

// PRODUCTS
Route::resource('products', 'Crud\ProductController');

// SEASONS
Route::resource('seasons', 'Crud\SeasonController');

// ITEMPRODUCTS
Route::resource('item_products', 'Crud\ItemProductController');

// USERS
Route::resource('users', 'Crud\UserController');

// USERTYPES
Route::resource('user_types', 'Crud\UserTypeController');

// SUBSCRIPTIONS
Route::resource('subscriptions', 'Crud\SubscriptionController');

//HOME
Route::get('/', 'Web\HomeController@index')->name('home');

//LOGIN
Route::get('/login', 'Auth\LoginController@open');
Route::get('/api/add-cart/{product}', 'Api\CartApiController@addToCart');
Route::get('/api/remove-cart/{product}', 'Api\CartApiController@removeFromCart');

Route::get('/register', 'Auth\RegisterController@open');

