<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('user_id')->nullable();  // Solo consideramos un propietario por propiedad
            $table->string('denominacion', 10)->comment("Nombre por el que se conoce la parte, p.e., 1 izda. Ent-B, etc.");
            $table->integer('parte')->comment("Cada una de las partes que componen la comunidad, según registro de la propiedad");
            $table->decimal('coeficiente', 5, 2)->comment("Porcentaje de participación en el total de la comunidad, según registro de la propiedad");
//   domiciliada --> iban no nulo. Para evitar validaciones se suprime este campo 'domiciliada' Salvo que le encontremos otra justificación
//           $table->boolean('domiciliada')->default('false')->comment("Cierto, si la propiedad tiene domiciliado el cobro de recibos");
            $table->char('iban', 24)->nullable()->comment("IBAN de la cuenta en la que se cargan los recibos domiciliados");
            $table->char('bic', 11)->nullable()
                    ->comment("El código BIC (Bank Identifier Code) o SWIFT sirve para identificar al banco beneficiario de una "
                            . "transferencia (o banco destino). Se trata de un código internacional alfanumérico que puede constar"
                            . " de 8 u 11 caracteres: Código de ocho caracteres: incluye información de la entidad, de cada país y"
                            . " de la localidad");
            $table->char('tipo', 4)->default('NCN')->comment("Tipo de propiedad: piso, ático, local,...; el default 'NCN' significa 'No consta'");
            $table->decimal('valor_catastral', 10, 2)->nullable();
            $table->string('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Las opciones de una FK se pueden consultar en la fuente:
            //    https://github.com/laravel/framework/blob/8.x/src/Illuminate/Database/Schema/ForeignKeyDefinition.php

//            $table->foreign('comunidad_id')->references('id')->on('comunidades')
//                    ->onDelete('cascade');
//            
//            $table->foreign('user_id')->references('id')->on('users')
//                    ->onDelete('set null');
//
//            $table->foreign('tipo')->references('codigo')->on('tipos_propiedad')
//                    ->onUpdate('cascade')
//                    ->onDelete('restrict'); //comprobar cómo procesa PostgreSql la opción 'restrict'


            $table->unique(['comunidad_id', 'parte']);
            $table->unique(['comunidad_id', 'denominacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('propiedades');
    }

}
