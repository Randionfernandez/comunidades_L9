<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            DivisaSeeder::class,
            TiposPropiedadSeeder::class,
            PaisSeeder::class,
            ProveedorSeeder::class,
            ActividadSeeder::class,
            GruposDistribucionSeeder::class,
            TiposGastoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
//            ComunidadSeeder::class,
//            MovimientosSeeder::class,
        ]);
    }

}
