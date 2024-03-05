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

Route::get('user/index', 'ApiUserController@index');
Route::post('user/store', 'ApiUserController@store');
Route::get('user/show/{id}', 'ApiUserController@show');
Route::put('user/update/{id}', 'ApiUserController@update');
Route::delete('user/destroy/{id}', 'ApiUserController@destroy');