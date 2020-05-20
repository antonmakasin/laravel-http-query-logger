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


Route::get('/http-query-logger', 'Oskingv\HttpQueryLogger\Http\Controllers\LogController@index')->name("http-query-logger.index");

Route::delete('/http-query-logger/delete', 'Oskingv\HttpQueryLogger\Http\Controllers\LogController@delete')->name("http-query-logger.deletelogs");
