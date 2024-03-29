<?php

namespace App\Providers;

//use App\Actions\Jetstream\AddTeamMember;
//use App\Actions\Jetstream\CreateTeam;
//use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
//use App\Actions\Jetstream\InviteTeamMember;
//use App\Actions\Jetstream\RemoveTeamMember;
//use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configurePermissions();
// De momento no usamos Teams, y es recomendable que sustituyamos Jetstream por Breeze
//        Jetstream::createTeamsUsing(CreateTeam::class);
//        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
//        Jetstream::addTeamMembersUsing(AddTeamMember::class);
//        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
//        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
//        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('super', __('Super'), [
            'create',
            'read',
            'update',
            'delete'
        ])->description(__('Super users can perform any action.'));

        Jetstream::role('admin', __('Admin'), [
            'create',
            'read',
            'update',
            'delete'
        ])->description(__('Admin users have the ability to read, create, update and delete.'));

        Jetstream::role('user', __('User'), [
            'read',
        ])->description(__('Just  read'));
    }
}
