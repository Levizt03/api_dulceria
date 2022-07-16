<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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

//Rutas producto
Route::get('/Producto', 'App\Http\Controllers\ProductoController@index');
Route::get('/Buscar-producto/{nombre}', 'App\Http\Controllers\ProductoController@buscar');
Route::post('/Crear-producto', 'App\Http\Controllers\ProductoController@crear');
Route::put('/Actualizar-producto/{id}', 'App\Http\Controllers\ProductoController@actualizar');
Route::delete('/Borrar-producto/{id}', 'App\Http\Controllers\ProductoController@borrar');

//Rutas Cliente


//Rutas promocion
Route::get('/Promocion', 'App\Http\Controllers\PromocionController@index');
Route::post('/Crear-promocion', 'App\Http\Controllers\PromocionController@crear');
Route::put('/Actualizar-promocion/{id}', 'App\Http\Controllers\PromocionController@actualizar');
Route::delete('/Borrar-promocion/{id}', 'App\Http\Controllers\PromocionController@borrar');
