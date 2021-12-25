<?php

namespace App\Providers;

use App\Models\Comunidad;
use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use function collect;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

// Definición de las gates de la aplicación

// Solo el susuario indicado puede crear comunidades        
        Gate::define('create-comunidad', function (User $user) {
            return ($user->email === 'randion@cifpfbmoll.eu');
        });

// Edita solo si el usuario es miembro de esa comunidad
        Gate::define('edit-comunidad', function (User $user, Comunidad $comunidad) {
          $cmds = collect(auth()->user()->comunidades);
          if ($cmds->contain(['id' => $comunidad->id]))
                return true;
        });

// Autoriza a borrar solo si el usuario es ell inidcado en el código
        Gate::define('delete-comunidad', function (User $user) {
            return ($user->email === 'randion@cifpfbmoll.eu');
        });
//         Fin definición de las gates
    }

}
