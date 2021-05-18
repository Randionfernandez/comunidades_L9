<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('providers', function (Blueprint $table) {

            $table->date('fechalta');
            $table->string('nif', 9)->unique();

             // $table->tipo  enum , y en la vista
            $table->enum('Tipo', ['Admin. Pública', 'Telefonía', 'Agua', 'Antenas', 'Antiplaga',
             'Ascensores', 'Comunidad', 'Desatascos', 'Electricidad', 'Electricista', 'Entidad Financiera', 'Fontanería',
             'Impermeabilizaciones', 'Jardinería', 'Jurídico', 'Limpieza', 'Piscinas', 'Porteros automáticos',
              'Puertas garajes', 'Rehabilitación', 'Seguros']);

            // $table->calificacion   enum pesimo mala normal buena excelente
            $table->enum('Calificacion', ['Pésima', 'Mala', 'Normal','Buena', 'Excelente']);

            // $table->figura   enum fisica juridica
            $table->enum('Figura', ['Física', 'Jurídica']);

            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('telefono');
            $table->string('calle');
            $table->smallInteger('portal');
            $table->string('bloque', 2)->nullable();
            $table->string('escalera',2)->nullable();
            $table->smallInteger('piso');
            $table->string('puerta', 4);
            $table->integer('codigopais');
            $table->integer('cp');
            $table->string('pais', 25);
            $table->string('provincia', 25);
            $table->string('localidad',4);
            $table->timestamps();

            /*$table->cuenta_pais;
            $table->dc;
            $table->cuenta;
            $table->bic;
            $table->comentario;*/

            // en la vista va tipo, calificacion, proveesor, nif, telefono, email

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
