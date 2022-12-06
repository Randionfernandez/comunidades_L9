<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $actividades = [
            ['codigo' => 'Ad_Pub', 'actividad' => 'Admin. Pública'],
            ['codigo' => 'TEL', 'actividad' => 'Telefonía'],
            ['codigo' => 'AGUA', 'actividad' => 'Agua'],
            ['codigo' => 'ANT', 'actividad' => 'Antenas'],
            ['codigo' => 'PLAGAS', 'actividad' => 'Antiplagas'],
            ['codigo' => 'ASCN', 'actividad' => 'Ascensores'],
            ['codigo' => 'CONT', 'actividad' => 'Contraincendios'],
            ['codigo' => 'DES', 'actividad' => 'Desatascos'],
            ['codigo' => 'ELEC', 'actividad' => 'Electriciad'],
            ['codigo' => 'BANCO', 'actividad' => 'Entidad financiera'],
            ['codigo' => 'FON', 'actividad' => 'Fontaneŕía'],
            ['codigo' => 'IMP', 'actividad' => 'Impermiabilizaciones'],
            ['codigo' => 'JAR', 'actividad' => 'Jardinería'],
            ['codigo' => 'JUR', 'actividad' => 'Jurídico'],
            ['codigo' => 'LMP', 'actividad' => 'Limpieza'],
            ['codigo' => 'PISC', 'actividad' => 'Piscinas'],
            ['codigo' => 'PA', 'actividad' => 'Porteros automáticos'],
            ['codigo' => 'PG', 'actividad' => 'Puertas garajes'],
            ['codigo' => 'REH', 'actividad' => 'Rehabilitación'],
            ['codigo' => 'SEG', 'actividad' => 'Seguros'],
        ];

        DB::table('actividades')->insert($actividades);

    }
}
