<?php

namespace Database\Factories;

use App\Models\Comunidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunidadFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comunidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        if (($cp = $this->faker->numberBetween(1, 15)) < 10)
            $cp = '0' . (string) $cp;
      
        return [
            'cif' => $this->faker->unique()->dni(),
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'partes' => 10,
            'denom' => 'C.P. ' . substr($this->faker->name, 0, 30), // denom: máximo 35 char
            'email' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->streetAddress(35), //secondaryAddress(), direccion: máximo 40 char
            'cp' => '070' . $cp,
            'localidad' => $this->faker->text(10), // localidad: máximo 35 char
            'municipio' => 'Palma de Mallorca',
            'provincia' => 'I.Baleares', //$this->faker->community(),
            'pais' => 'ESP',
        ];
    }

}
