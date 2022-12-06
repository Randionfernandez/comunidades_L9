<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('comunidades', function (Blueprint $table) {

            $table->id();

            $table->string('cif', 9)->unique();
            $table->date('fechalta');
            $table->boolean('activa')->default(true)->comment('Si no está activa, no se pueden realizar operaciones sobre esta comunidad');
            $table->boolean('gratuita')->default(true)->comment('Indica si esta comunidad es de pago o gratuita');
            $table->integer('partes')->comment('Cantidad de unidades registrales que componen la comunidad');
            $table->string('denom', 35)->comment('Nombre de la comunidad');
            $table->string('email', 40)->nullable()->comment('Necesaria para notificaciones, por ejemplo, de Hacienda. En un futuro será obligatorio, problemente');
            $table->string('direccion', 40)->comment('Dirección postal: calle, número, escalera, bloque, piso, etc');
            $table->char('cp', 5)->comment('Código postal');
            $table->string('municipio', 35)->nullable();
            $table->string('localidad', 35)->nullable();
            $table->string('provincia')->nullable()->comment('Deducible a partir del código postal. Podría suprimirse. No figura en el form de create');
            $table->char('pais', 3)->default('ESP')->comment('Código ISO del país, 3 caracteres');
            $table->string('logo')->nullable()->comment('Imagen con el logo de la comunidad');
            $table->string('observaciones')->nullable();

            $table->string('presidente', 35)->nullable();
            $table->string('secretario', 35)->nullable();
            $table->string('administrador', 35)->nullable();

            $table->foreign('pais')->references('codigoISO3')->on('paises');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidades');
    }

}
