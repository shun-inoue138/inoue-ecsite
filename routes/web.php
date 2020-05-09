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

Route::post('/management/new/confirm', 'ManagementsController@newConfirm')->name('');
Route::post('/management/{id}/edit/confirm', 'ManagementsController@new')->name('');

Route::get('/management/new', 'ManagementsController@newPage')->name('new.page');
Route::post('/management/new/complete', 'ManagementsController@newComplete')->name('newComplete');
Route::get('/management', 'ManagementsController@index')->name('management.top');
Route::get('/management/{id}', 'ManagementsController@detail')->name('management.detail');

//todo:putにしてもよい
Route::post('/management/{id}/edit', 'ManagementsController@edit')->name('edit');
Route::get('/management/{id}/edit', 'ManagementsController@editPage')->name('edit.page');
Route::delete('/management/{id}/delete', 'ManagementsController@delete')->name('delete');

Route::post('/cart', 'CartsController@in')->name('in');
Route::get('/cart', 'CartsController@index')->name('cart');
Route::delete('/cart', 'CartsController@decrease')->name('decrease');

Route::get('/', 'ProductsController@index')->name('product.list');
Route::get('/{id}', 'ProductsController@detail')->name('detail');

