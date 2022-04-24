<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = User::create([
//                    'doi' => $this->faker->unique()->dni(),  // doi es nullable
                    'name' => 'Rafael',
                    'apellidos' => 'Andión',
                    'fechalta' => "2010-05-01",
                    'email' => 'randion@cifpfbmoll.eu',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);

        User::create([
//            'doi' => $this->faker->unique()->dni(),
            'name' => 'invitado',
            'apellidos' => 'Invitado',
            'fechalta' => "2010-05-01",
            'email' => 'randionfernandez@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secretos'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();
    }

}
