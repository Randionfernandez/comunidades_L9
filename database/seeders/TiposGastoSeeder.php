<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tipos_gasto')->insert([
            ['orden' => '1', 'grupo_id' => 'ESCL', 'codigo' => 'LIM', 'concepto' => 'Limpieza escalera'],
            ['orden' => '2', 'grupo_id' => 'COEF', 'codigo' => 'REP', 'concepto' => 'Reparaciones y mejoras'],
            ['orden' => '3', 'grupo_id' => 'UREG', 'codigo' => 'GBC', 'concepto' => 'Gastos bancarios'],
            ['orden' => '4', 'grupo_id' => 'COEF', 'codigo' => 'SEG', 'concepto' => 'Seguros'],
            ['orden' => '5', 'grupo_id' => 'ESCL', 'codigo' => 'ELE', 'concepto' => 'Electricidad escalera'],
            ['orden' => '6', 'grupo_id' => 'UREG', 'codigo' => 'ADM', 'concepto' => 'Administración'],
            ['orden' => '7', 'grupo_id' => 'COEF', 'codigo' => 'AGU', 'concepto' => 'Agua'],
            ['orden' => '8', 'grupo_id' => 'COEF', 'codigo' => 'ALC', 'concepto' => 'Alcantarillado'],
            ['orden' => '9', 'grupo_id' => 'COEF', 'codigo' => 'ASC', 'concepto' => 'Ascensor'],
            ['orden' => '10', 'grupo_id' => 'COEF', 'codigo' => 'BAS', 'concepto' => 'Basuras'],
            ['orden' => '11', 'grupo_id' => 'COEF', 'codigo' => 'GAS', 'concepto' => 'Gas'],
            ['orden' => '12', 'grupo_id' => 'COEF', 'codigo' => 'PIS', 'concepto' => 'Piscina'],
            ['orden' => '13', 'grupo_id' => 'COEF', 'codigo' => 'POR', 'concepto' => 'Portería'],
         //   ['orden' => '', 'grupo_id' => '', 'codigo' => '', 'concepto' => ''],
        ]);
    }
}
