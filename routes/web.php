<?php

use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', 'ItemsController@index')->name('items.index');
Route::get('/items/{type}', 'ItemsController@list')->name('items.list');
Route::get('/items/show/{id}', 'ItemsController@show')->name('items.show');

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