<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
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

            // TODO: Suprimir los 1 nullable siguientes
            $table->foreignId('user_id')->nullable()->constrained('users')->comment('Identifica al usuario que creó o editó el movimiento. Posteriormente no será nullable');
            $table->foreignId('cuenta_id')->constrained('cuentas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('comunidad_id')->constrained('comunidades')->comment('A suprimir cuando se complete con apuntes contables');
/////////////////////
            $table->string('propiedad', 8)->comment('A suprimir cuando se complete con apuntes contables');
            $table->char('mov', 1)->comment('A suprimir cuando se complete con apuntes contables');
            $table->string('siglas', 4)->comment('A suprimir cuando se complete con apuntes contables');

/////////////////////
            $table->unique(['cuenta_id', 'n_op']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }

}
