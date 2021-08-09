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
    public function definition() {     // Mejorar este factory, especial- denominacion y parte
        return [
            //  'user_id' => '',  // Solo consideramos un propietario por propiedad
            'denominacion' => 'piso ' . $this->getLetra(),
            'parte' => $this->getParte(),
            'coeficiente' => '10',
            'domiciliada' => true,
            'iban' => $this->faker->iban('ES'),
            'tipo' => $this->faker->randomElement(['VIV', 'ATC', 'APT', 'LOC']),
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
