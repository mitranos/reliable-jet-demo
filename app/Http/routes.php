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

Route::get('/', function () {
    return view('welcome');
});

Route::get('databases', 'DatabaseController@index');
Route::get('statistics', 'DatabaseController@stats');
Route::get('databases/{id}', 'DatabaseController@show');
Route::post('databases/create', 'DatabaseController@store');
Route::get('databases/{id}/delete', 'DatabaseController@destroy');
