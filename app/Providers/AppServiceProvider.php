<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::share('navLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'contenedor', 'name' => 'contenedor', 'text' => 'Contenedor'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.*', 'text' => 'Communities'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Incidencias tabla'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Comunidades'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Acciones'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Personas'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Proveedores'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Inmuebles'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Presupuestos'],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Honorarios'],
            ]);
    }
}
