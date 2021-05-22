<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            
            $user = new User();

            $table->id();
            $table->string('name', 30);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();

            $table->integer('limitMaxFreeCommunities')->default($user->limitMaxCommunities());

            /*$table->enum("Tratamiento", ["Sr", "Sra"]);
            $table->string('Apellido1', 30);
            $table->string('Apellido2', 30);
            $table->enum("Tipo", ["Fisica", "Juridica"]);
            $table->date('Fecha');
            $table->string('DNI', 9);
            $table->string('Telefono', 9);
            $table->string('Calle', 30);
            $table->string('Portal', 4);
            $table->string('Bloque', 4);
            $table->string('Escalera', 4);
            $table->string('Piso', 4);
            $table->string('Puerta', 4);
            $table->string('Codigo_pais', 2);
            $table->string('CP', 5);
            $table->string('Pais', 20);
            $table->string('Provincia', 20);
            $table->string('Localidad', 20);*/

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
