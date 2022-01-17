<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['orden' => '1', 'grupo_cod' => 'ESCL', 'codigo' => 'LIM', 'concepto' => 'Limpieza escalera'],
            ['orden' => '2', 'grupo_cod' => 'COEF', 'codigo' => 'REP', 'concepto' => 'Reparaciones y mejoras'],
            ['orden' => '3', 'grupo_cod' => 'UREG', 'codigo' => 'GBC', 'concepto' => 'Gastos bancarios'],
            ['orden' => '4', 'grupo_cod' => 'COEF', 'codigo' => 'SEG', 'concepto' => 'Seguros'],
            ['orden' => '5', 'grupo_cod' => 'ESCL', 'codigo' => 'ELE', 'concepto' => 'Electricidad escalera'],
            ['orden' => '6', 'grupo_cod' => 'UREG', 'codigo' => 'ADM', 'concepto' => 'Administración'],
            ['orden' => '7', 'grupo_cod' => 'COEF', 'codigo' => 'AGU', 'concepto' => 'Agua'],
            ['orden' => '8', 'grupo_cod' => 'COEF', 'codigo' => 'ALC', 'concepto' => 'Alcantarillado'],
            ['orden' => '9', 'grupo_cod' => 'COEF', 'codigo' => 'ASC', 'concepto' => 'Ascensor'],
            ['orden' => '10', 'grupo_cod' => 'COEF', 'codigo' => 'BAS', 'concepto' => 'Basuras'],
            ['orden' => '11', 'grupo_cod' => 'COEF', 'codigo' => 'GAS', 'concepto' => 'Gas'],
            ['orden' => '12', 'grupo_cod' => 'COEF', 'codigo' => 'PIS', 'concepto' => 'Piscina'],
            ['orden' => '13', 'grupo_cod' => 'COEF', 'codigo' => 'POR', 'concepto' => 'Portería'],
         //   ['orden' => '', 'grupo_cod' => '', 'codigo' => '', 'concepto' => ''],
        ]);
    }
}
