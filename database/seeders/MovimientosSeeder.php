<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
//        Eloquent::unguard();
        DB::unprepared(file_get_contents('database/movimientos_simulacion.sql'));
    }
}
