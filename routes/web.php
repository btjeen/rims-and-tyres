<?php

use Illuminate\Support\Facades\Route;

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

// Public routes
Route::get('/', 'ItemsController@index');
Route::get('/items/{type}', 'ItemsController@list');
Route::get('/items/show/{id}', 'ItemsController@show');

// Admin routes
Route::get('/admin', 'AdminsController@index');
