<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GruposDistribucion extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('grupos_distribucion')->insert([
            ['orden' => '1',  'codigo' => 'COE', 'nombre' => 'Coeficiente'],
            ['orden' => '2',  'codigo' => 'UR', 'nombre' => 'Unidad registral'],
            ['orden' => '3',  'codigo' => 'ESC', 'nombre' => 'Escalera'],
        ]);
    }

}
