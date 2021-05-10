<?php

namespace Database\Factories;

use App\Models\comunidad_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class Comunidad_UserFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = comunidad_user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        
        $comunidades = DB::table('comunidades')->pluck('id');
        $users = DB::table('users')->pluck('id');
        $role = DB::table('roles')->pluck('id');
        
        return [
            'comunidad_id' => $this->faker->randomElement($comunidades),
            'user_id' => $this->faker->randomElement($users),
            'role_id' => $this->faker->randomElements($role),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
