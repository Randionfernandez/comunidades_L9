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

        Gate::define('crear-comunidad', function ($user) {
            return ($user->email === 'randion@cifpfbmoll.eu');
        });

        Gate::define('editar-comunidad', function (User $user, Comunidad $comunidad) {
            //   
            $cmds = collect(auth()->user()->comunidades);
            
       //     dd($cmds);
//            if ($cmds->has('id'))
//                return true;
            return true;  // siempre autorizará
        });
    }

}
