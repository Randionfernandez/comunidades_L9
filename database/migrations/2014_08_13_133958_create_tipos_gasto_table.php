<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposGastoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tipos_gasto', function (Blueprint $table) {

            $table->char('codigo',3)->primary();
            $table->char('grupo_cod', 4)->comment('Grupo de distribución al que pertenece');
            $table->unsignedTinyInteger('orden');
            $table->string('concepto',25);
            $table->timestamps();
            
            $table->foreign('grupo_cod')->references('codigo')->on('grupos_distribucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tipos_gasto');
    }

}
