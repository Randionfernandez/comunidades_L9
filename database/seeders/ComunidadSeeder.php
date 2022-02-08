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
              
        Comunidad::create([
            'cif' => '111222333A',
            'denom' => 'C.P. El Gallinero', // denom: máximo 35 char
            'fechalta' => '2011-05-11',
            'partes' => 11,
            'email' => 'randionfernandez@gmail.com',
            'direccion' => 'Rua 13 del percebe',
            'localidad' => 'Palma de Mallorca',
            'municipio' => 'Palma de Mallorca',
            'provincia' => 'I.Baleares', //$this->faker->community(),
            'cp' => '07007',
            'pais' => 'ESP',
        ]);      
        
        
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
            