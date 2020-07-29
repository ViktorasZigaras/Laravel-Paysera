<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

###

// Route::prefix('admin/products')/*, 'name' => 'product'*/ ->group(function() {
//     Route::get ('',     'ProductController@index');
//     Route::get ('',     'ProductController@create');
//     Route::post('',     'ProductController@store' ->name('product.store'));
//     Route::get ('{id}', 'ProductController@edit');
//     Route::post('{id}', 'ProductController@update');
//     Route::post('{id}', 'ProductController@destroy');
//     Route::get ('{id}', 'ProductController@show');

//     // Route::get('{id}', ['show' => 'ProductController@show']);
// });

Route::group(['prefix' => 'admin/products'], function() {
    Route::get ('',                 'ProductController@index')   ->name('product.index');
    Route::get ('create',           'ProductController@create')  ->name('product.create');
    Route::post('store',            'ProductController@store')   ->name('product.store');
    Route::get ('edit/{product}',   'ProductController@edit')    ->name('product.edit');
    Route::post('update/{product}', 'ProductController@update')  ->name('product.update');
    Route::post('delete/{product}', 'ProductController@destroy') ->name('product.destroy');
    Route::get ('show/{product}',   'ProductController@show')    ->name('product.show');
});

# hidden field, name="_method value="delete"

Route::get ('/',       'FrontController@home')   ->name('front.home');
Route::post('/add',    'FrontController@add')    ->name('front.add');
Route::post('/add-JS', 'FrontController@addJS')  ->name('front.addJS');
Route::post('remove',  'FrontController@remove') ->name('front.remove');
Route::post('buy',     'FrontController@buy')    ->name('buy');

Route::get ('paysera/accept',   'FrontController@payseraAccept')    ->name('paysera.accept');
Route::get ('paysera/cancel',   'FrontController@payseraCancel')    ->name('paysera.cancel');
Route::post('paysera/callback', 'FrontController@payseraCallback') ->name('paysera.callback');