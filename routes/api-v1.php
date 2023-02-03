<?php

use App\Http\Controllers\Api\ComunidadController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MovimientoController;
use App\Http\Controllers\Api\PropiedadController;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware gr oup. Enjoy building your API!
  |
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', LoginController::class)->name('api/v1/login');

Route::name('api.v1')->apiResource('comunidades', ComunidadController::class)->parameter('comunidades', 'comunidad');
Route::name('api.v1')->apiResource('movimientos', MovimientoController::class);
Route::name('api.v1')->apiResource('propiedades', PropiedadController::class)->parameter('propiedades', 'propiedad');



