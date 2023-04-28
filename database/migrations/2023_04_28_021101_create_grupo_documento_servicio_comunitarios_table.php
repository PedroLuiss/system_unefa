<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoDocumentoServicioComunitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_documento_servicio_comunitarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId("documento_servicio_comunitario_id")->comment("Id de la tabla documentos servicio comunitario");
            $table->foreignId("grupo_s_c_id")->comment("Id de la tabla grupo_s_c");
            $table->boolean("checket")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_documento_servicio_comunitarios');
    }
}
