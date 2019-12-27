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

//FrontEndController

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/product/{slug}', 'FrontEndController@singleProduct')->name('product.single');

//Managing Products

Route::resource('products', 'ProductsController');

//Showing Cart

Route::get('/cart', 'ShoppingController@cart')->name('cart');

//Managing Cart via Ajax

Route::post('/ajax/cart/add', 'CartAjaxController@addToCart')->name('ajax.add');
Route::get('/ajax/cart/rapid/add/{id}', 'CartAjaxController@rapidAdd')->name('ajax.rapid.add');
Route::get('/ajax/cart/delete/{id}', 'CartAjaxController@deleteCartItem')->name('ajax.delete');
Route::get('/ajax/cart/increment/{id}/{qty}', 'CartAjaxController@incrementCartItem')->name('ajax.increment');
Route::get('/ajax/cart/decrement/{id}/{qty}', 'CartAjaxController@decrementCartItem')->name('ajax.decrement');

//Managing Checkout

Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('/cart/checkout', 'CheckoutController@pay')->name('cart.checkout');

//Managing Orders

Route::get('/orders/list', 'OrdersController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrdersController@single')->name('orders.single');
Route::post('/orders/update/{id}', 'OrdersController@update')->name('orders.update');

//Managing UserData

Route::get('/account', 'UserDataController@index')->name('userdata.index');
Route::get('/account/create/data', 'UserDataController@create')->name('userdata.create');
Route::post('/account/store/data', 'UserDataController@store')->name('userdata.store');
Route::get('/account/edit', 'UserDataController@edit')->name('userdata.edit');
Route::post('/account/update/{id}', 'UserDataController@update')->name('userdata.update');
