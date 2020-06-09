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

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

Route::get('/','InicioController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route ::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=> 'auth'], function(){
	Route::get('', 'AdminController@index');
	//rutar del usuario
	Route::get('usuario', 'UsuarioController@index') ->name('usuario');
	Route::get('usuario/crear', 'UsuarioController@create') ->name('crear_usuario')->middleware('permisocrear');
	Route::post('usuario', 'UsuarioController@store')->name('guardar_usuario');
	Route::get('usuario/{id}/editar', 'UsuarioController@edit') ->name('editar_usuario')->middleware('permisoeditar');
	Route::put('usuario/{id}', 'UsuarioController@update') ->name('actualizar_usuario');
	Route::delete('usuario/{id}', 'UsuarioController@destroy')->name('eliminar_usuario')->middleware('permisoeliminar');
	Route::post('usuario/{usuario}', 'UsuarioController@ver')->name('ver_usuario');
	//rutas usuario-rol
	Route::get('usuario-rol', 'UsuarioRolController@index') ->name('usuario_rol');
	Route::post('usuario-rol', 'UsuarioRolController@store') ->name('guardar_usuario_rol');
	Route::get('usuario/{id}/inactivo', 'UsuarioRolController@desactivar') ->name('desactivar_usuario')->middleware('permisoeliminar');
	Route::get('usuario/{id}/activo', 'UsuarioRolController@activar') ->name('activar_usuario')->middleware('permisoeliminar');

	//rutas del menu
	Route::get('menu/crear', 'MenuController@create') ->name('crear_menu')->middleware('permisocrear');
	Route::get('menu', 'MenuController@index') ->name('menu');
	Route::post('menu', 'MenuController@store') ->name('guardar_menu');
	Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar-orden');
	Route::get('menu/{id}/editar', 'MenuController@edit') ->name('editar_menu')->middleware('permisoeditar');
	Route::put('menu/{id}', 'MenuController@update') ->name('actualizar_menu');
	Route::get('menu/{id}/eliminar', 'MenuController@destroy') ->name('eliminar_menu')->middleware('permisoeliminar');
	//rutas del rol
	Route::get('rol', 'RolController@index') ->name('rol');
	Route::get('rol/crear', 'RolController@create') ->name('crear_rol')->middleware('permisocrear');
	Route::get('rol/{id}/editar', 'RolController@edit') ->name('editar_rol')->middleware('permisoeditar');
	Route::post('rol', 'RolController@store') ->name('guardar_rol');
	Route::put('rol/{id}', 'RolController@update') ->name('actualizar_rol');
	Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol')->middleware('permisoeliminar');
	//rutas del menu-rol
	Route::get('menu-rol', 'MenuRolController@index') ->name('menu_rol');
	Route::post('menu-rol', 'MenuRolController@store') ->name('guardar_menu_rol');
	//rutas para las unidades
	Route::get('unidad', 'UnidadController@index') ->name('unidad');
	Route::get('unidad/crear', 'UnidadController@create')->name('crear_unidad')->middleware('permisocrear');
	Route::post('unidad', 'UnidadController@store')->name('guardar_unidad');
	Route::get('unidad/{id}/editar', 'UnidadController@edit') ->name('editar_unidad')->middleware('permisoeditar');
	Route::put('unidad/{id}', 'UnidadController@update') ->name('actualizar_unidad');
	Route::delete('unidad/{id}', 'UnidadController@destroy')->name('eliminar_unidad')->middleware('permisoeliminar');
	Route::get('ver_unidad/{id}', 'UnidadController@ver') ->name('ver_unidad');
	Route::get('unidad/{id}/pdf', 'UnidadController@pdf')->name('pdf_unidad');
	//rutas para el personal
	Route::get('personal', 'PersonalController@index') ->name('personal');
	Route::get('personal/crear', 'PersonalController@create')->name('crear_personal')->middleware('permisocrear');
	Route::post('personal', 'PersonalController@store')->name('guardar_personal');
	Route::get('personal/{id}/editar', 'PersonalController@edit') ->name('editar_personal')->middleware('permisoeditar');
	Route::put('personal/{id}', 'PersonalController@update') ->name('actualizar_personal');
	Route::delete('personal/{id}', 'PersonalController@destroy')->name('eliminar_personal')->middleware('permisoeliminar');

	Route::post('personal/{personal}', 'PersonalController@ver')->name('ver_personal');
	Route::get('personal/{id}/curriculum', 'PersonalController@pdf')->name('ver_curriculum');
	//rutas del calendario
	Route::get('calendario', function () {
		return view('admin/calendario/index');
	});
	Route::resource('eventos', 'CalendarioController');
});


