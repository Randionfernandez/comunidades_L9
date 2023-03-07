<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'doi' => fake()->unique()->dni(),
            'name' => fake()->firstname,
            'apellidos' => fake()->lastname,
            'fechalta' => fake()->dateTimeBetween('-10 years', 'now'),
            'email' => fake()->unique()->safeEmail,
            'email_verified_at' => now(),
            //          'password' => Hash::make('secretos'),
                      'password' => '$2y$10$QlfN7CbALaYJSTPmQ69CdeW5uFOd3pcm.Gke78.pypt.zQljlso/2', // password hardcoded to 'secretos'
            // la password está hardcodeada en la migración de la tabla users a 'secretos'.
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

}
