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

//Managing Cart

Route::post('/cart/add', 'ShoppingController@addToCart')->name('cart.add');

Route::get('/cart/rapid/add/{id}', 'ShoppingController@rapidAdd')->name('cart.rapid.add');

Route::get('/cart', 'ShoppingController@cart')->name('cart');

Route::get('/cart/delete/{id}', 'ShoppingController@deleteCartItem')->name('cart.delete');

Route::get('/cart/increment/{id}/{qty}', 'ShoppingController@incrementCartItem')->name('cart.increment');

Route::get('/cart/decrement/{id}/{qty}', 'ShoppingController@decrementCartItem')->name('cart.decrement');

//Managing Checkout

Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');

Route::post('/cart/checkout', 'CheckoutController@pay')->name('cart.checkout');

//Managing Orders

Route::get('/orders/list', 'OrdersController@index')->name('orders.index');

Route::get('/orders/{id}', 'OrdersController@single')->name('orders.single');

Route::post('/orders/update/{id}', 'OrdersController@update')->name('orders.update');
