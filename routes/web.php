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
//ユーザー登録確認画面
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('confirm');

//ゲストログイン
Route::get('/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

//飲食店用の認証機能
Route::prefix('restaurant')->namespace('Restaurant')->name('restaurant.')->group(function () {
    Auth::routes();
    Route::get('/', 'RestaurantController@index')->name('index');
    Route::get('/guest', 'Auth\LoginController@guestLogin')->name('login.guest');
    Route::get('/edit', 'RestaurantController@getEdit')->name('edit')->middleware('auth:restaurant');
    Route::post('/edit', 'RestaurantController@postEdit')->name('postEdit')->middleware('auth:restaurant');
    Route::get('/show', 'RestaurantController@show')->name('show');
    //ユーザー削除機能
    Route::get('/delete', 'RestaurantController@delete')->name('user.delete')->middleware('auth:restaurant');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/cart', 'CartController@add')->name('add');
    Route::post('/cart/delete', 'CartController@delete')->name('delete');
    Route::get('/cart/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/cart/success', 'CartController@success')->name('success');
    //お気に入り出力
    Route::get('/favorite', 'FavoriteController@index')->name('favorite');
    //お気に入り追加処理
    Route::post('/favorite', 'FavoriteController@add')->name('favorite.add');
    //お気に入り削除処理
    Route::post('/favorite/delete', 'FavoriteController@delete')->name('favorite.delete');
});

//トップページ
Route::get('/', 'ProductController@index')->name('products.index');
//indexとshowを除外
Route::resource('/products', 'ProductController')->except(['index', 'show'])->middleware('auth');
//showのみ誰でも閲覧可能
Route::resource('/products', 'ProductController')->only(['show']);
//カテゴリー別商品一覧表示
Route::get('/products/category/{category_number}', 'ProductController@category_show')->name('products.category_show');

//生産者（user）情報
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/list', 'UserController@list')->name('list');
    Route::get('/detail/{id}', 'UserController@detail')->name('detail');
    Route::get('/edit', 'UserController@getEdit')->name('edit')->middleware('auth');
    Route::post('/edit', 'UserController@postEdit')->name('postEdit')->middleware('auth');
    Route::get('/show', 'UserController@show')->name('show')->middleware('auth');
    Route::get('/delete', 'UserController@delete')->name('delete')->middleware('auth');
});
