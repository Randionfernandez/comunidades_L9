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

        Comunidad::factory()
                ->has(Cuenta::factory()->count(1))
                ->has(Propiedad::factory()->count(5))
                ->count(5)
                ->create();
    }

}
            