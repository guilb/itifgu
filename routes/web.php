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


   Route::resource('itinerary', 'ItineraryController');
   Route::resource('place', 'PlaceController');
    Route::get('/schedule', 'PlaceController@schedule')->name('place.schedule');


    Route::get('/', 'PlaceController@index')->name('home');
