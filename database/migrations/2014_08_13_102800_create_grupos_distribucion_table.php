<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposDistribucionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('grupos_distribucion', function (Blueprint $table) {
            $table->timestamps();
            $table->char('id', 4)->primary();
            $table->integer('orden');
            $table->string('nombre');
            $table->date('baja')->nullable;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('grupos_distribucion');
    }

}
