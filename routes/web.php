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

Route::get('/','InicioController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route ::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=> 'auth'], function(){
	Route::get('', 'AdminController@index');
	//rutar del usuario
	Route::get('usuario', 'UsuarioController@index') ->name('usuario');
	Route::get('usuario/crear', 'UsuarioController@create') ->name('crear_usuario');
	Route::post('usuario', 'UsuarioController@store')->name('guardar_usuario');
	Route::get('usuario/{id}/editar', 'UsuarioController@edit') ->name('editar_usuario');
	Route::put('usuario/{id}', 'UsuarioController@update') ->name('actualizar_usuario');
	Route::delete('usuario/{id}', 'UsuarioController@destroy')->name('eliminar_usuario');
	//rutas del menu
	Route::get('menu/crear', 'MenuController@create') ->name('crear_menu');
	Route::get('menu', 'MenuController@index') ->name('menu');
	Route::post('menu', 'MenuController@store') ->name('guardar_menu');
	Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar-orden');
	Route::get('menu/{id}/editar', 'MenuController@edit') ->name('editar_menu');
	Route::put('menu/{id}', 'MenuController@update') ->name('actualizar_menu');
	Route::get('menu/{id}/eliminar', 'MenuController@destroy') ->name('eliminar_menu');
	//rutas del rol
	Route::get('rol', 'RolController@index') ->name('rol');
	Route::get('rol/crear', 'RolController@create') ->name('crear_rol');
	Route::get('rol/{id}/editar', 'RolController@edit') ->name('editar_rol');
	Route::post('rol', 'RolController@store') ->name('guardar_rol');
	Route::put('rol/{id}', 'RolController@update') ->name('actualizar_rol');
	Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol');
	//rutas del menu-rol
	Route::get('menu-rol', 'MenuRolController@index') ->name('menu_rol');
	Route::post('menu-rol', 'MenuRolController@store') ->name('guardar_menu_rol');
	//rutas para las unidades
	Route::get('unidad', 'UnidadController@index') ->name('unidad');
	Route::get('unidad/crear', 'UnidadController@create')->name('crear_unidad');
	Route::post('unidad', 'UnidadController@store')->name('guardar_unidad');
	Route::get('unidad/{id}/editar', 'UnidadController@edit') ->name('editar_unidad');
	Route::put('unidad/{id}', 'UnidadController@update') ->name('actualizar_unidad');
	Route::delete('unidad/{id}', 'UnidadController@destroy')->name('eliminar_unidad');



});


