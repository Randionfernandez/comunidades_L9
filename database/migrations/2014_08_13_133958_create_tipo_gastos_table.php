<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoGastos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_gastos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->number('orden');
            $table->char('codigo');
            $table->char('grupo_id', 3)->comment('Grupo de distribución al que pertenece');
            $table->string('concepto');
            
            $table->foreign('grupo_id')->references('codigo')->on('grupos_distristribucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_gastos');
    }
}
