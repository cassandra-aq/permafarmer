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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('carts', 'Crud\CartController');

Route::resource('products', 'Crud\ProductController');

Route::resource('seasons', 'Crud\SeasonController');

// USERS
Route::resource('users', 'Crud\UserController');

// USERTYPES
Route::resource('user_types', 'Crud\UserTypeController');

// SUBSCRIPTIONS
Route::resource('subscriptions', 'Crud\SubscriptionController');


=======
>>>>>>> 3da1c641158a384bae5f64984cee8d37e64ffee3
