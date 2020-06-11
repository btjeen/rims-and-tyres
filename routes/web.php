<?php

use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', 'ItemsController@index')->name('items.index');
Route::get('/items/{type}', 'ItemsController@list')->name('items.list');
Route::get('/items/show/{id}', 'ItemsController@show')->name('items.show');

Route::get('/basket', 'OrderController@index')->name('orders.index');
Route::post('/basket', 'OrderController@addToBasket')->name('orders.addToBasket');
Route::post('/order/checkout', 'OrderController@checkout')->name('orders.checkout');

// Admin routes
Route::get('/admin', 'AdminsController@index')->name('admin.index');
Route::post('/admin', 'AdminsController@import')->name('admin.import');
Route::delete('/admin', 'AdminsController@destroy')->name('admin.destroy');

// Authentication routes
Auth::routes([
    'register'  => false,
    'confirm'   => false,
    'verify'   => false,
    'email'     => false,
    'reset'     => false,
]);