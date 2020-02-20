<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/clientes', 'ClienteController@index');
Route::post('/cliente', 'ClienteController@store');
Route::get('/cliente/{id}', 'ClienteController@show');
Route::post('/cliente/{id}', 'ClienteController@update');
Route::delete('/cliente/{id}', 'ClienteController@destroy');
