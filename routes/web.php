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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/json/{id}/start', "JsonController@startServer");
Route::get('/json/{id}/stop', "JsonController@stopServer");
Route::get('/json/{id}/restart', "JsonController@restartServer");
Route::get('/json/{id}/kill', "JsonController@killServer");

Route::get('/json/{id}/info', "JsonController@getInfo");
Route::get('/json/{id}/status', "JsonController@getStatus");
Route::get('/json/{id}/console', "JsonController@getConsole");
Route::get('/json/{id}/playersCount', "JsonController@getPlayersCount");
Route::get('/json/{id}/players', "JsonController@getPlayers");

Route::get('/json/{id}/resouces', "JsonController@getResources");
Route::get('/json/{id}/history/memory', "JsonController@getHistoryMemory");
Route::get('/json/{id}/history/processor', "JsonController@getHistoryProcessor");

Route::get('/json/{id}/command/{command}', "JsonController@sendConsoleCommand");
