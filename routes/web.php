<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//use App\Services\Transistor;
use Psr\Container\ContainerInterface;

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


Route::middleware('auth')->resource('/comunidades', ComunidadController::class)->parameters(['comunidades'=> 'comunidad']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('cuentas', CuentaController::class);

Route::resource('movimientos', MovimientoController::class);


Route::get('/contenedor', function (ContainerInterface $container) {
    return dd($container);
})->name('contenedor');
