<?php

namespace App\Providers;

//use Illuminate\Support\Facades\DB;


use App\Models\Comunidad;
use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use function isSuperAdmin;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     * eam::class => TeamPolicy::class,
      ];

      /**
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

////////////////           Definición de las gates de la aplicación
//        Gate::before(function ($user) {
//            if (isSuperAdmin($user))
//                return true;
//        });

// Solo el susuario indicado puede crear comunidades        
        Gate::define('create-comunidad', function (User $user) {
            $cmd = $user->comunidades->where('gratuita', true);
            if (count($cmd) <= env('MAX_FREE_COMMUNITIES'))
                return true;
        });
        

// Edita solo si el usuario es miembro de esa comunidad con rol 'Admin'
//        No testado
        Gate::define('edit-comunidad', function (User $user, Comunidad $comunidad) {
            $items = DB::table('comunidad_user')
                    ->where('comunidad_id', $comunidad->id)
                    ->where('user_id', $user->id)
                    ->where('role_name', 'Admin')
                    ->count();
            if ($items == 1)  // más de un item no puede haber
                return true;
            return false;
        });

// Autoriza a borrar solo si el usuario es el indicado en el código
        Gate::define('delete-comunidad', function (User $user) {
            if (isSuperAdmin($user))
                return true;
            return false;
        });
////////////////            Fin definición de las gates
    }

}
