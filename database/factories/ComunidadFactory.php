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
    public function definition(): array
    {
        if (($cp = fake()->numberBetween(1, 15)) < 10)
            $cp = '0' . $cp;

        return [
            'cif' => fake()->unique()->vat(),
            'fechalta' => fake()->dateTimeBetween('-2 year'),
            'partes' => 10,
            'denom' => 'C.P. ' . substr(fake()->name, 0, 30), // denom: máximo 35 char
            'email' => fake()->unique()->safeEmail,
            'direccion' => fake()->streetAddress(35), //secondaryAddress(), direccion: máximo 40 char
            'cp' => '070' . $cp,
            'localidad' => fake()->text(10), // localidad: máximo 35 char
            'municipio' => 'Palma de Mallorca',
            'provincia' => 'I.Baleares', //fake()->community(),
            'pais' => 'ESP',
        ];
    }

}
