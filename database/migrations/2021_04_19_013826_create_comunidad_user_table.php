<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('comunidad_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comunidad_id')->constrained('comunidades')
                ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()
                ->onDelete('cascade');
            $table->string('role_name')->default('Invitado');
//            $table->foreignId('role_name')->constrained()
//                    ->onDelete('restrict')->default('2');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_name')->references('name')->on('roles')->default('Invitado');  // definir ondelete y onupdate
            $table->unique(['comunidad_id', 'user_id']);

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidad_user');
    }

}
