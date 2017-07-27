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

Route::get('/', "HomeController@index");

// Authentication routes...
Route::get('auth/login', [
	'as' => 'login',
	'uses' => 'Auth\AuthController@showLogin'
]);
Route::post('auth/login', 'Auth\AuthController@doLogin');

Route::get('auth/logout',[
	'as' => 'auth.login',
	'uses' => 'Auth\AuthController@doLogout'
]);

// Registration routes...
Route::get('auth/register', [
	'as' => 'auth.login',
	'uses' => 'Auth\AuthController@showRegister'
]);
Route::post('auth/register', 'Auth\AuthController@doRegister');

// Server routes...

Route::group(['prefix' => 'server', 'as' => 'server::'], function () {

	Route::get('/', [
		'as' => 'server.index',
		'uses' => 'ServerController@index'
	]);

	Route::get('list', [
		'as' => 'server.list',
		'uses' => 'ServerController@listAll'
	]);

	Route::get('configuration', [
		'as' => 'server.configurations',
		'uses' => 'ServerController@showConfiguration'
	]);

	Route::get('{id}', [
		'as' => 'server.server',
		'uses' => 'ServerController@show'
	]);

	Route::get('{id}/console', [
		'as' => 'server.console',
		'uses' => 'ServerController@showConsole'
	]);

	Route::get('{id}/players', [
		'as' => 'server.players',
		'uses' => 'ServerController@showPlayers'
	]);

	Route::get('{id}/permissions', [
		'as' => 'server.permissions',
		'uses' => 'ServerController@showPermissionsPermission'
	]);

	Route::get('{id}/permissions/permission', [
		'as' => 'server.permissions.permission',
		'uses' => 'ServerController@showPermissionsPermission'
	]);

	Route::get('{id}/permissions/user', [
		'as' => 'server.permissions.user',
		'uses' => 'ServerController@showPermissionsUser'
	]);

	Route::get('{id}/configurations', [
		'as' => 'server.configuration',
		'uses' => 'ServerController@showConfiguration'
	]);
});



// Permissions

Route::group(['prefix' => 'permissions', 'as' => 'permission::'], function () {
	Route::get('/', [
		'as' => 'permissions.list',
		'uses' => 'PermissionsController@index'
	]);

	Route::get('{id}/permissions', [
		'as' => 'permissions.permission',
		'uses' => 'PermissionsController@editPermissions'
	]);
	Route::get('{id}/users', [
		'as' => 'permissions.edit.user',
		'uses' => 'PermissionsController@editUsers'
	]);

	// Adicionar Permissão
	Route::get('{id}/permissions/add', [
		'as' => 'permissions.add.permission',
		'uses' => 'PermissionsController@AddPermissionGet'
	]);
	Route::post('{id}/permissions/add', [
		'as' => 'permissions.add.permission',
		'uses' => 'PermissionsController@AddPermissionPost'
	]);

	// Adicionar Usuário
	Route::get('{id}/users/add', [
		'as' => 'permissions.add.user',
		'uses' => 'PermissionsController@addUsersGet'
	]);
	Route::post('{id}/users/add', [
		'as' => 'permissions.add.user',
		'uses' => 'PermissionsController@addUsersPost'
	]);
});

// Configuração

Route::group(['prefix' => 'settings', 'as' => 'settings::'], function () {
	Route::get('servers', [
		'as' => 'settings.servers',
		'uses' => 'SettingsController@serversGet'
	]);

	Route::get('permissions', [
		'as' => 'settings.permissions',
		'uses' => 'SettingsController@permissionsGet'
	]);
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
