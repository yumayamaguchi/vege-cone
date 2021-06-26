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

Auth::routes();

Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products','ProductController')->except(['index', 'show'])->middleware('auth');
Route::resource('/products','ProductController')->only(['show']);

//URIは、users/xxx,ルーティングの名前(Name)は、users.xxx
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/list','UserController@list')->name('list');
    Route::get('/{producer_name}','UserController@show')->name('show');
});
