<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();         
            
            $table->string('iban',30)->unique();
            $table->string('num_cuenta',25)->unique()->comment('Subconjunto de iban, se puede suprimir');
            $table->string('siglas',4);
            $table->string('denominacion',30);
            $table->date('fecha_apertura');
            $table->boolean('activa')->default(true);
            $table->decimal('saldo',8,2)->default(0);
            $table->string('bic')->nullable();
            $table->char('divisa',5)->default('EUR');
            $table->text('comentarios')->nullable();

            $table->unsignedBigInteger('comunidad_id');

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cuentas');
    }

}
