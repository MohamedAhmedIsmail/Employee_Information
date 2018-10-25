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

Route::get('/dashboard/{id}', 'ListingsController@show');
Route::get('/listings/create/{id}', 'ListingsController@create');
Route::get('/listings/edit/{user_id}/{listing_id}','ListingsController@edit');
Route::get('/', 'dashboardController@index');
Route::get('/AllEmployees', 'dashboardController@index');
Route::resource('listings','ListingsController');

