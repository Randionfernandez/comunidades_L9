<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropiedadFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propiedad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {     // Mejorar este factory, especialmente 'denominacion' y 'parte'
        return [
//            'user_id' => factory(App\Models\User::class), // Solo consideramos un propietario por propiedad
            'denominacion' => 'piso ' . $this->getLetra(),
            'parte' => $this->getParte(),
            'coeficiente' => '10',
            'iban' => fake()->iban('ES'),
            'tipo' => fake()->randomElement(['VIV', 'ATC', 'APT', 'LOC']),
            'comunidad_id' => 2, // factory(App\Models\Comunidad::class),
        ];
    }

    protected function getParte() {
        static $num_parte = 1;

        return $num_parte++;
    }

    protected function getLetra() {
        static $letra = 'A';

        return $letra++;
    }

}
