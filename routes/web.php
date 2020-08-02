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

//Vista previa
Route::get('/index','empleado_controller@index');

//Eliminando empleados
Route::get('/eliminar/{id}','empleado_controller@eliminar_empleado');

//Ingresar los nuevos empleados
Route::post('/agregar','empleado_controller@agregar_empleado');

// Obteniendo datos para actualización de empleados
Route::get('/getDatosEmpl/{id}', 'empleado_controller@get_Datos_empleados');

//Modificar empleado
Route::post('/modificarEmpl', 'empleado_controller@modificar_empleado');

//Eliminando empresas
Route::get('/eliminarEmpr/{id}','empresa_controller@eliminar_empresa');

//Ingresar nuevas empresas
Route::post('/agregarEmpr','empresa_controller@agregar_empresa');

// Obteniendo datos para actualización de empresa
Route::get('/getDatosEmpr/{id}', 'empresa_controller@get_Datos_empresa');

//Modificar empresa
Route::post('/modificarEmpre', 'empresa_controller@modificar_empresa');

