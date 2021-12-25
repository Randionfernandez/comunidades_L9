<?php

// Notación abreviada  a partir de la versión 7


use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\JuntaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaisController;
use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

//use App\Serv/ices\RedisEventPusher;
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
Route::get('lang/{locale?}', function ($locale = 'en') {
//    App::SetLocale($locale);
//    $lang= App::currentLocale();
    switch ($locale) {
        case 'es': echo "El idiomma seleccionado es: " . App::currentLocale();
            break;
        default: echo "Qué mal se me da el inglés";
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('set_language/{lang}', function ($language) {
    if (array_key_exists($language, config('languages'))) {
        session()->put('applocale', $language);
    }
    return back();
})->name('set_language');

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
Route::middleware('auth')->resource('documentos', DocumentoController::class);
Route::middleware('auth')->resource('spiojkhs', PaisController::class)->parameters(['spiojkhs' => 'cuadrando']);

Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

// Ruta ejecutada cuando la ruta de la petición entrante no es reconocida por 
// ninguna de las anteriores rutas. Mantener siempre al final de este fichero.
Route::fallback(function () {
    return view('fallback');
});
