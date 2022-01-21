<?php

use App\Http\Controllers\Api\ComunidadController;
use App\Http\Controllers\Api\MovimientoController;
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


Route::apiResource('comunidades', ComunidadController::class)->names([
    'index' => 'api.v1.comunidades.index',
    'store' => 'api.v1.comunidades.store',
    'show' => 'api.v1.comunidades.show',
    'update' => 'api.v1.comunidades.update',
    'destroy' => 'api.v1.comunidades.destroy',
    ]);

Route::apiResource('movimientos', MovimientoController::class)->names([
    'index' => 'api.v1.movimientos.index',
    'store' => 'api.v1.movimientos.store',
    'show' => 'api.v1.movimientos.show',
    'update' => 'api.v1.movimientos.update',
    'destroy' => 'api.v1.movimientos.destroy',
    ]);