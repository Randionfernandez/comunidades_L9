<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Illuminate\Support\Facades\View::share('denom','Rua del percebe');
        \Illuminate\Support\Facades\View::share('navLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'contenedor', 'name' => 'contenedor', 'text' => 'Contenedor'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.*', 'text' => 'Communities'],
            ['href' => 'comunidades.index', 'name' => 'Mi cuenta', 'text' => 'Mi cuenta'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Incidencias tabla'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.create', 'text' => 'Comunidades'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.show', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.edit', 'text' => 'Personas'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.update', 'text' => 'Proveedores'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.delete', 'text' => 'Inmuebles'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.restore', 'text' => 'Presupuestos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.eliminar', 'text' => 'Honorarios'],
            ]);
    }
}
