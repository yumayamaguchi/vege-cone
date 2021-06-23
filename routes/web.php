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

Route::get('/', 'ProductController@index')->name('product.index');

// Route::get('/login/producer', 'Auth\LoginController@showProducerLoginForm');
// Route::get('/register/producer', 'Auth\RegisterController@showProducerRegisterForm');

// Route::post('/login/producer', 'Auth\LoginController@producerLogin');
// Route::post('/register/producer', 'Auth\RegisterController@createProduce');

// Route::view('/producer', 'producer')->middleware('auth:producer')->name('producer');
