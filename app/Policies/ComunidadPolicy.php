<?php

namespace App\Policies;

use App\Models\Comunidad;
use App\Models\User;
use http\Client\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComunidadPolicy {

    use HandlesAuthorization;

    public function before(User $user) {
        if ($user->role === 'superadmin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user) {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comunidad  $comunidad
     * @return mixed
     */
    public function view(User $user, Comunidad $comunidad) {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user) {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comunidad  $comunidad
     * @return mixed
     */
    public function update(User $user, Comunidad $comunidad) {
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comunidad  $comunidad
     * @return mixed
     */
    public function delete(User $user, Comunidad $comunidad) {
        return isSuperAdmin()
            ? Response::allow()
            : Response::deny(__('Usted no es superAdmin, no puede borrar esta comunidad.'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comunidad  $comunidad
     * @return mixed
     */
    public function restore(User $user, Comunidad $comunidad) {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comunidad  $comunidad
     * @return mixed
     */
    public function forceDelete(User $user, Comunidad $comunidad) {
        //
    }

}
