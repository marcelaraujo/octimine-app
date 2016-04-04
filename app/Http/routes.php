<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

Route::get('/beers', [
    'as' => 'beers.index', 'uses' => 'BeersController@index'
]);

Route::get('/beers/create', [
    'as' => 'beers.create', 'uses' => 'BeersController@create'
]);

Route::post('/beers', [
    'as' => 'beers.store', 'uses' => 'BeersController@store'
]);

Route::get('/beers/{id}', [
    'as' => 'beers.edit', 'uses' => 'BeersController@edit'
]);

Route::put('/beers/{id}', [
    'as' => 'beers.update', 'uses' => 'BeersController@update'
]);

Route::delete('/beers/{id}', [
    'as' => 'beers.destroy', 'uses' => 'BeersController@destroy'
]);