<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('n_op')->comment('Número de operación, a veces no esta disponible, depende de la cuenta y de los listados');
            $table->date('fecha');
            $table->date('fechavalor')->comment('Si no se conoce, su valor se copia del campo fecha');
            $table->decimal('importe', 12, 2);
            $table->decimal('saldo', 12, 2)->comment('Saldo resultante después de aplicar este movimiento. Solo informativo, sirve para comprobaciones');
            $table->string('concepto', 80)->comment('Longitud según norma CSB43 se ajustará a 38 en un futuro');
            $table->boolean('contabilizado')->default('false');

            $table->unsignedBigInteger('user_id')->nullable()->comment('Identifica al usuario que creó o editó el movimiento. Posteriormente no será nullable');
            $table->unsignedBigInteger('cuenta_id');
/////////////////////
            $table->string('propiedad', 8)->comment('A suprimir cuando se complete con apuntes contables');
            $table->char('mov', 1)->comment('A suprimir cuando se complete con apuntes contables');
            $table->string('siglas', 4)->comment('A suprimir cuando se complete con apuntes contables');
            $table->unsignedBigInteger('comunidad_id')->nullable()->comment('A suprimir cuando se complete con apuntes contables');
/////////////////////
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['cuenta_id', 'n_op']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('movimientos');
    }

}
