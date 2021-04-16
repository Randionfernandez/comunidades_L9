<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();

            $table->string('cif', 12)->unique();
            $table->date('fechalta');
            $table->boolean('activa')->default('true');
            $table->integer('partes')->default(10)->comment('Cantidad de unidades registrales que componen la comunidad');
            
            $table->string('denom', 35);
            $table->string('direccion', 40);
            $table->string('localidad', 35);
            $table->string('provincia')->nullable();
            $table->char('cp', 5)->comment('Código postal');
            $table->string('pais')->default('ES');
            $table->string('logo')->nullable()->comment('Imagen con el logo de la comunidad');
            $table->string('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comunidades');
    }

}
