<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunidad;
use App\Models\Cuenta;
use App\Models\Propiedad;

class ComunidadSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
// Dos formas de crear relaciones: 
//      has(Propiedad::factory()->count(5);   o bien
//      hasPropiedades(5) Comunidad tiene una relación one to many llamada propiedades
        Comunidad::factory()
                ->has(Cuenta::factory()->count(1))
                ->hasPropiedades(5)
                ->count(5)
                ->create();
    }

}
            