<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AutorizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole = Role::create(['name' => 'Admin']);
        $propietarioRole = Role::create(['name' => 'Propietario']);
        $invitadoRole = Role::create(['name' => 'Invitado']);
    }
}
