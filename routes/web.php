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
    Route::get('/create_invoice/{id}', 'InvoiceController@store')->name('invoice.store'); ;

});

Route::middleware('auth')->group(function () {
    Route::resource('profile', 'UserController', [
        'only' => ['edit', 'update'],
        'parameters' => ['profile' => 'user']
    ]);
    Route::resource('order', 'OrderController');
    Route::post('/order_status/{id}/{status}', 'OrderController@update_status')->name('order.status');

    Route::resource('invoice', 'InvoiceController', [
        'except' => 'store'
    ]);
    Route::name('userparking')->get('userparking/{slug}', 'UserController@parking');
    Route::post('/load_product/{id}', 'ProductController@load_product');

});