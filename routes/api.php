<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api')
    ->name('api.')
    ->group(function(){
        Route::get('users','UserController@index')->name('users');
        Route::get('users/{slug}','UserController@show')->name('show');
        Route::post('/messages', 'MessageController@store')->name('messages');
        Route::post('/reviews', 'ReviewController@store')->name('reviews');
    });
