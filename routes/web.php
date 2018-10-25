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

Route::middleware('admin')->group(function () {
    Route::resource ('category', 'CategoryController', [
        'except' => 'show'
    ]);
    Route::resource('product', 'ProductController');    
    Route::resource('user', 'UserController');    

});

Route::middleware('auth')->group(function () {
    Route::resource('profile', 'UserController', [
        'only' => ['edit', 'update'],
        'parameters' => ['profile' => 'user']
    ]);
    Route::resource('order', 'OrderController');
    Route::post('/order_cancel/{id}', 'OrderController@cancel')->name('order.cancel');;
    Route::post('/order_valid/{id}', 'OrderController@valid')->name('order.valid');;

    Route::name('userparking')->get('userparking/{slug}', 'UserController@parking');
    Route::post('/load_product/{id}', 'ProductController@load_product');

});