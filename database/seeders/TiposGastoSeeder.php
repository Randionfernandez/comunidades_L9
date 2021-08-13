<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposGasto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tipos_gasto')->insert([
            ['orden' => '1', 'reparto_id' => 'ESC', 'codigo' => 'LIM', 'concepto' => 'Limpieza escalera'],
            ['orden' => '2', 'reparto_id' => 'COE', 'codigo' => 'REP', 'concepto' => 'Reparaciones y mejoras'],
            ['orden' => '3', 'reparto_id' => 'UR', 'codigo' => 'GBC', 'concepto' => 'Gastos bancarios'],
            ['orden' => '4', 'reparto_id' => 'COE', 'codigo' => 'SEG', 'concepto' => 'Seguros'],
            ['orden' => '5', 'reparto_id' => 'ESC', 'codigo' => 'ELE', 'concepto' => 'Electricidad escalera'],
            ['orden' => '6', 'reparto_id' => 'UR', 'codigo' => 'ADM', 'concepto' => 'Administración'],
        ]);
    }
}
