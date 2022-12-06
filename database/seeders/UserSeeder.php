<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use App\Models\Comunidad_User;
use App\Models\Cuenta;
use App\Models\Propiedad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $admin = User::factory()
            ->create([
            'doi' => fake()->unique()->dni(),  // doi es nullable
            'name' => 'Rafael',
            'apellidos' => 'Andión',
            'fechalta' => "2010-05-01",
            'email' => 'randion@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Comunidad::factory()
            ->has(Cuenta::factory(2))
            ->has(Propiedad::factory(11), 'propiedades')
            ->hasAttached($admin)
            ->create([
                'denom' => 'C.P. El Gallinero', // denom: máximo 35 char
                'fechalta' => '2011-05-11',
                'partes' => 11,
                'email' => 'randionfernandez@gmail.com',
                'direccion' => 'Rua 13 del percebe',
                'localidad' => 'Palma de Mallorca',
                'municipio' => 'Palma de Mallorca',
                'provincia' => 'I.Baleares', //fake()->community(),
                'cp' => '07007',
                'pais' => 'ESP',
            ]);

        $invitado = User::factory()
            ->has(Comunidad::factory(2)->has(Cuenta::factory())->has(Propiedad::factory(6),'propiedades'), 'comunidades')
            ->create([
                'name' => 'invitado',
                'apellidos' => 'Invitado',
                'fechalta' => "2010-05-01",
                'email' => 'randionfernandez@gmail.com',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

        User::factory(4)
            ->has(Comunidad::factory()->has(Propiedad::factory(8),'propiedades')->has(Cuenta::factory()),'comunidades')
            ->create();

        Comunidad::factory(4)
            ->has(Cuenta::factory())
            ->has(Propiedad::factory(7),'propiedades')
            ->hasAttached($admin)
            ->create();

        Comunidad_User::where('role_name','Invitado')->update([
            'role_name' => 'Admin',
        ]);


//        $comunidades = Comunidad::all();         ///////////   CORREGIR
        /*        foreach ($comunidades as $comunidad) {
                    Comunidad_User::create([
                                'comunidad_id' => $comunidad->id,
                                'user_id' => $admin->id,
                                'role_name' => 'Admin', // Revisar cuando se sustituya por Spatie/laravel-permission
                    ]);
                    Comunidad_User::create([
                                'comunidad_id' => $comunidad->id,
                                'user_id' => $invitado->id,
                                'role_name' => 'Invitado', // Revisar cuando se sustituya por Spatie/laravel-permission
                    ]);
                }*/


    }

}
