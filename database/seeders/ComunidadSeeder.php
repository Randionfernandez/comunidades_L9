<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use App\Models\Cuenta;
use App\Models\Propiedad;
use App\Models\User;
use Illuminate\Database\Seeder;

class ComunidadSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::find(1);



// Dos formas de crear relaciones:
//      has(Propiedad::factory()->count(5);   o bien
//      hasPropiedades(5) Comunidad tiene una relación one to many llamada propiedades
        for ($i = 1; $i < 6; $i++) {
            Comunidad::factory()
                ->has(Cuenta::factory()->count(1))
                ->hasPropiedades(random_int(2, 15))
                ->create();
        }
    }
}
