<?php
declare(strict_types=1);
// Notación abreviada  a partir de la versión 7
use App\Http\Controllers\{
    ComunidadController,
    CuentaController,
    DocumentoController,
    MovimientoController,
    PropiedadController,
    ProveedorController,
    JuntaController,
    UserController,
};
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

Route::middleware('auth')->resource('/comunidades', ComunidadController::class)->parameter('comunidades', 'comunidad')
        ->except(['show']);
Route::middleware('auth')->get('/seleccionar/{comunidad}', [ComunidadController::class, 'seleccionar'])->name('comunidades.seleccionar');

Route::middleware('auth')->resource('cuentas', CuentaController::class);
Route::middleware('auth')->resource('propiedades', PropiedadController::class)->parameter('propiedades', 'propiedad');
Route::middleware('auth')->resource('juntas', JuntaController::class);
Route::middleware('auth')->resource('proveedores', ProveedorController::class)->parameter('proveedores', 'proveedor');
;
Route::middleware('auth')->resource('movimientos', MovimientoController::class);
Route::middleware('auth')->resource('usuarios', UserController::class);
Route::middleware('auth')->resource('documentos', DocumentoController::class);

// Ruta ejecutada cuando la ruta de la petición entrante no es reconocida por 
// ninguna de las anteriores rutas. Mantener siempre al final de este fichero.
Route::fallback(function () {
    return view('fallback');
})->middleware('auth');
