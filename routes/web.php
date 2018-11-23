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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '/feedbacks'], function () {
    Route::get('/', 'FeedbackController@index')->name('feedbacks.index');
    Route::post('/', 'FeedbackController@store')->name('feedbacks.store');
});

Route::group(['prefix' => '/dishes'], function () {
    Route::get('/', 'DishController@index')->name('dishes.index');
    Route::post('/', 'DishController@store')->name('dishes.store');
    Route::get('/create', 'DishController@create')->name('dishes.create')->middleware('auth');
    Route::put('/{dish}', 'DishController@update')->name('dishes.update');
    Route::get('/{dish}', 'DishController@show')->name('dishes.show');
    Route::delete('/{dish}', 'DishController@destroy')->name('dishes.destroy');
    Route::get('/{dish}/edit', 'DishController@edit')->name('dishes.edit');
});
