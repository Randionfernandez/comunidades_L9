<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                    'name' => 'Rafael',
                    'apellidos' => 'Andión',
                    'fechalta' => "2010-05-01",
                    'email' => 'randion@cifpfbmoll.eu',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);
        
        User::create([
                    'name' => 'invitado',
                    'apellidos' => 'Invitado',
                    'fechalta' => "2010-05-01",
                    'email' => 'randionfernandez@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
    }
}
