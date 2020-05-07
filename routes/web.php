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
Route::get('/', 'ProductsController@index')->name('product_list');
Route::get('/{id}', 'ProductsController@detail')->name('detail');
Route::get('/management', 'ManagementsController@index')->name('management_top');
Route::get('/management/{id}', 'ManagementsController@detail')->name('management_detail');
Route::put('/management/{id}/edit', 'ManagementsController@edit')->name('edit');
Route::delete('/management/{id}/delete', 'ManagementsController@delete')->name('delete');
Route::post('/management/new', 'ManagementsController@new')->name('new');

