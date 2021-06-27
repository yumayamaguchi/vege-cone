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
//生産者用の認証機能
Auth::routes();

//飲食店用の認証機能
Route::prefix('restaurant')->namespace('Restaurant')->name('restaurant.')->group(function(){
    Auth::routes();
    Route::get('/', 'RestaurantController@index')->name('restaurant_home');
});

//トップページ
Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products','ProductController')->except(['index', 'show'])->middleware('auth');
Route::resource('/products','ProductController')->only(['show']);

//生産者一覧、マイページ
//URIは、users/xxx,ルーティングの名前(Name)は、users.xxx
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/list','UserController@list')->name('list');
    Route::get('/{producer_name}','UserController@show')->name('show');
});
