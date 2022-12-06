<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model')->nullable();

            $table->string('titulo', 50)->nullable();
            $table->string('carpeta', 15)->default('General')
                ->comment('Clasifica el documento: general, comunidad, facturas, presupuestos, juntas, etc.');
            $table->string('descripcion')->nullable();
            $table->boolean('visible')->default('true')
                ->comment('Si es visible o no en el portal del propietario.- No está claro si se mantendrá este campo');
            $table->string('name');
            $table->string('hash_name');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }

}
