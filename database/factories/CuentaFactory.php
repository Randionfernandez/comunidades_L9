<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuentaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cuenta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'iban' => fake()->iban('ES'),
            'fecha_apertura' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'bic' => fake()->swiftBicNumber(),
            'divisa' => 'EUR',

        ];
    }
}
