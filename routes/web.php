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


// PRODUCTS
Route::get('/produits/index', 'ProductController@index')->name('index_genre');
Route::get('/produits/ajouter', 'ProductController@create')->name('create_genre');
Route::get('/produits/modifier/{id}', 'ProductController@edit')->name('edit_genre');
Route::post('/produits/store', 'ProductController@store')->name('store_genre');
Route::put('/produits/update/{genre}', 'ProductController@update')->name('update_genre');
Route::get('/produits/destroy/{id}', 'ProductController@destroy')->name('destroy_genre');


// USERS
Route::resource('users', 'Crud\UserController');
