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

Route::get('/','HomeController@index');
Route::get('home', 'HomeController@index');

Route::controllers([
    'users' => 'UsersController',
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['prefix' => 'administracion', 'namespace' => 'Administracion'], function() {
    Route::resource('clientes', 'ClientesController');
});

Route::group(['prefix' => 'security', 'namespace' => 'Security'], function() {
    Route::resource('users', 'UsersController');
    Route::resource('perfiles', 'PerfilesController');
    Route::resource('permisos', 'PermisosController');
});

Route::group(['prefix' => 'ayuda', 'namespace' => 'Ayuda'], function() {
    Route::resource('enviarcomentario', 'EnviarComentarioController');
});
Route::get('ayuda/acercade','Ayuda\AcercaDeController@index');