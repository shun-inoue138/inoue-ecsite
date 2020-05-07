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

Auth::routes();

Route::post('/cart', 'CartsController@in')->name('in');
Route::get('/cart', 'CartsController@index')->name('cart');
Route::delete('/cart', 'CartsController@decrease')->name('decrease');
Route::get('/', 'ProductsController@index')->name('home');
Route::get('/{id}', 'productsController@detail')->name('detail');

