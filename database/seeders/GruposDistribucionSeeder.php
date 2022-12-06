<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposDistribucionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('grupos_distribucion')->insert([
            ['orden' => '1',  'codigo' => 'COEF', 'nombre' => 'Coeficiente'],
            ['orden' => '2',  'codigo' => 'UREG', 'nombre' => 'Unidad registral'],
            ['orden' => '3',  'codigo' => 'ESCL', 'nombre' => 'Escalera'],
        ]);
    }

}
