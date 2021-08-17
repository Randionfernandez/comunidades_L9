<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
//        \Illuminate\Support\Facades\View::share('denom','Rua del percebe');
//        \Illuminate\Support\Facades\View::share('navLinks', [
//            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
//            ['href' => 'contenedor', 'name' => 'contenedor', 'text' => 'Contenedor'],
//            ['href' => 'comunidades.index', 'name' => 'comunidades.*', 'text' => 'Communities'],
//            ['href' => 'comunidades.index', 'name' => 'Mi cuenta', 'text' => 'Mi cuenta'],
//            ]);
    }

}
