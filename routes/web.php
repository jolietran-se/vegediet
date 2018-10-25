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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/dishes'], function () {
    Route::get('/', 'DishController@index')->name('dishes.index');
    Route::post('/', 'DishController@store')->name('dishes.store');
    Route::get('/create', 'DishController@create')->name('dishes.create');
    Route::put('/{$id}', 'DishController@update')->name('dishes.update');
    Route::get('/{$id}', 'DishController@show')->name('dishes.show');
    Route::delete('/{$id}', 'DishController@destroy')->name('dishes.destroy');
    Route::get('/{$id}/edit', 'DishController@edit')->name('dishes.edit');
});
