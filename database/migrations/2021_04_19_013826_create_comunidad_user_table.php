<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidad_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comunidad_id')->constrained('comunidades')
                    ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()
                    ->onDelete('cascade');
            $table->foreignId('role_id')->constrained()
                    ->onDelete('restrict')->default(2);

            $table->unique(['comunidad_id', 'user_id']);
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
        Schema::dropIfExists('comunidad_user');
    }

}
