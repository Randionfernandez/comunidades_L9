<?php

//use App\Services\Transistor;


use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\JuntaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
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

Route::get('/', function(){
    return view('welcome');
    
});

Route::get('/user/{id}/roles', function (User $id) {
    $roles = $id->roles();
    return $roles;
})->name('user.roles');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (Comunidad $comunidad) {
    $comunidad = session('cmd_seleccionada');
    return view('dashboard', compact('comunidad'));
})->name('dashboard');

Route::middleware('auth')->resource('/comunidades', ComunidadController::class)->parameters(['comunidades' => 'comunidad'])
        ->except(['show']);
Route::middleware('auth')->get('/seleccionar/{comunidad}', [ComunidadController::class, 'seleccionar'])->name('comunidades.seleccionar');

Route::middleware('auth')->resource('cuentas', CuentaController::class);
Route::middleware('auth')->resource('propiedades', PropiedadController::class)->parameters(['propiedades' => 'propiedad']);
Route::middleware('auth')->resource('juntas', JuntaController::class);
Route::middleware('auth')->resource('proveedores', ProveedorController::class);
Route::middleware('auth')->resource('movimientos', MovimientoController::class);
Route::middleware('auth')->resource('usuarios', UserController::class);

Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

//Route::get('/contenedor', function (ContainerInterface $container) {
//    return dd($container);
//})->name('contenedor');

// Ruta ejecutada cuando la ruta de la petición entrante no es reconocida por 
// ninguna de las anteriores rutas. Mantener siempre al final de este fichero.
Route::fallback(function () {
    return view('fallback');
});
