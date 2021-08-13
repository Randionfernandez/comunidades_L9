<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_propiedad')->insert([
            ['codigo' => 'NoC', 'descripcion' => 'No consta'],
            ['codigo' => 'APT', 'descripcion' => 'Apartamento'],
            ['codigo' => 'EST', 'descripcion' => 'Estudio'],
            ['codigo' => 'DUP', 'descripcion' => 'Dúplex'],
            ['codigo' => 'VIV', 'descripcion' => 'Piso'],
            ['codigo' => 'ATC', 'descripcion' => 'Ático'],
            ['codigo' => 'PAR', 'descripcion' => 'Pareado'],
            ['codigo' => 'LOC', 'descripcion' => 'Local comercial'],
            ['codigo' => 'PGA', 'descripcion' => 'Plaza de garaje'],
            ['codigo' => 'TRS', 'descripcion' => 'Trastero'],
            ['codigo' => 'CSU', 'descripcion' => 'Casa Unifamiliar'],
            ['codigo' => 'DES', 'descripcion' => 'Despacho'],
            
        ]);
    }
}