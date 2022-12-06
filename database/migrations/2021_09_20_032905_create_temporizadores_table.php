<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporizadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    { // recoge diversas marcas de tiempo creadas en el index.php de la aplic.
        Schema::create('temporizadores', function (Blueprint $table) {
            $table->id();

            $table->string('aplicacion', 30);
            $table->timestamp('created_at')->default(now());
            $table->double('start');
            $table->double('start_autoload');
            $table->double('start_bootstrap');
            $table->double('start_kernel');
            $table->double('start_tap');
            $table->double('start_terminate');
            $table->double('start_total');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('temporizadores');
    }
}
