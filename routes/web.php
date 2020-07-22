<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

###

Route::group(['prefix' => 'admin/products'], function() {
    Route::get('', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('update/{product}', 'ProductController@update')->name('product.update');
    Route::post('delete/{product}', 'ProductController@destroy')->name('product.destroy');
    Route::get('show/{product}', 'ProductController@show')->name('product.show');
});