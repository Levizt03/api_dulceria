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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas Producto
Route::get('/Producto', 'App\Http\Controllers\ProductoController@index');
Route::get('/Buscar-producto/{nombre}', 'App\Http\Controllers\ProductoController@buscar');
Route::post('/Crear-producto', 'App\Http\Controllers\ProductoController@crear');
Route::put('/Actualizar-producto/{id}', 'App\Http\Controllers\ProductoController@actualizar');
Route::delete('/Borrar-producto/{id}', 'App\Http\Controllers\ProductoController@borrar');

//Rutas Cliente
Route::get('/Cliente', 'App\Http\Controllers\ClienteController@index');
Route::get('/Buscar-cliente/{nombre}', 'App\Http\Controllers\ClienteController@buscar');
Route::post('/Crear-cliente', 'App\Http\Controllers\ClienteController@crear');
Route::put('/Actualizar-cliente/{id}', 'App\Http\Controllers\ClienteController@actualizar');
Route::delete('/Borrar-cliente/{id}', 'App\Http\Controllers\ClienteController@borrar');

//Rutas promocion
Route::get('/Promocion', 'App\Http\Controllers\PromocionController@index');
Route::post('/Crear-promocion', 'App\Http\Controllers\PromocionController@crear');
Route::put('/Actualizar-promocion/{id}', 'App\Http\Controllers\PromocionController@actualizar');
Route::delete('/Borrar-promocion/{id}', 'App\Http\Controllers\PromocionController@borrar');

//Ruta Tarjeta
Route::post('/Crear-tarjeta', 'App\Http\Controllers\TarjetaController@crear');
Route::put('/Actualizar-tarjeta/{id}', 'App\Http\Controllers\TarjetaController@actualizar');
Route::delete('/Borrar-tarjeta/{id}', 'App\Http\Controllers\TarjetaController@borrar');

//Ruta Tipo de tarjeta
Route::get('/Tipo-tarjeta', 'App\Http\Controllers\Tipo_tarjetaController@index');
Route::post('/Crear-tipo-tarjeta', 'App\Http\Controllers\Tipo_tarjetaController@crear');
Route::put('/Actualizar-tipo-tarjeta/{id}', 'App\Http\Controllers\Tipo_tarjetaController@actualizar');
Route::delete('/Borrar-tipo-tarjeta/{id}', 'App\Http\Controllers\Tipo_tarjetaController@borrar');

//Ruta Empleado
Route::get('/Empleado', 'App\Http\Controllers\EmpleadoController@index');
Route::get('/Buscar-empleado/{nombre}', 'App\Http\Controllers\EmpleadoController@buscar');
Route::post('/Crear-empleado', 'App\Http\Controllers\EmpleadoController@crear');
Route::put('/Actualizar-empleado/{id}', 'App\Http\Controllers\EmpleadoController@actualizar');
Route::delete('/Borrar-empleado/{id}', 'App\Http\Controllers\EmpleadoController@borrar');

//Ruta Categoria
Route::get('/Categoria', 'App\Http\Controllers\CategoriaController@index');
Route::post('/Crear-categoria', 'App\Http\Controllers\CategoriaController@crear');
Route::put('/Actualizar-categoria/{id}', 'App\Http\Controllers\CategoriaController@actualizar');
Route::delete('/Borrar-categoria/{id}', 'App\Http\Controllers\CategoriaController@borrar');

//Ruta ticket(simple)
Route::get('/Ticket', 'App\Http\Controllers\TicketController@index');
Route::post('/Crear-ticket', 'App\Http\Controllers\TicketController@crear');
Route::put('/Actualizar-ticket/{id}', 'App\Http\Controllers\TicketController@actualizar');
Route::delete('/Borrar-ticket/{id}', 'App\Http\Controllers\TicketController@borrar');
