<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPropiedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tipos_propiedad', function (Blueprint $table) {
            $table->char('codigo', 3);
            $table->string('descripcion', 20);

            $table->primary('codigo');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_propiedad');
    }
}
