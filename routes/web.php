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
Route::prefix('restaurant')->namespace('Restaurant')->name('restaurant.')->group(function () {
    Auth::routes();
    Route::get('/', 'RestaurantController@index')->name('restaurant_home');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/cart', 'CartController@add')->name('add');
    Route::get('/{restaurant_name}', 'RestaurantController@show')->name('show');

});

//トップページ
Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products', 'ProductController')->except(['index', 'show'])->middleware('auth');
Route::resource('/products', 'ProductController')->only(['show']);

//生産者（user）情報
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/list', 'UserController@list')->name('list');
    Route::get('/detail/{producer_name}', 'UserController@detail')->name('detail');
    Route::get('/edit/{producer_name}', 'UserController@getEdit')->name('edit')->middleware('auth');
    Route::post('/edit/{producer_name}', 'UserController@postEdit')->name('postEdit')->middleware('auth');
    Route::get('/{producer_name}', 'UserController@show')->name('show')->middleware('auth');
});

//カート処理
// Route::name('line_item.')->group(function() {
//     Route::post('/line_item/create', 'LineItemController@create')->name('create');
//     Route::post('/line_item/delete', 'LineItemController@delete')->name('delete');
// });
