<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

###

// Route::group(['prefix' => 'authors'], function() {
//     Route::get('', 'AuthorController@index')->name('author.index');
//     Route::get('create', 'AuthorController@create')->name('author.create');
//     Route::post('store', 'AuthorController@store')->name('author.store');
//     Route::get('edit/{author}', 'AuthorController@edit')->name('author.edit');
//     Route::post('update/{author}', 'AuthorController@update')->name('author.update');
//     Route::post('delete/{author}', 'AuthorController@destroy')->name('author.destroy');
//     Route::get('show/{author}', 'AuthorController@show')->name('author.show');
// });