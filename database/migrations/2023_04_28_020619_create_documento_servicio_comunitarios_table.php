<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoServicioComunitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_servicio_comunitarios', function (Blueprint $table) {
            $table->id();
            $table->string("documento")->nullable();
            $table->boolean("checket")->default(false);
            $table->integer("fase")->nullable();
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
        Schema::dropIfExists('documento_servicio_comunitarios');
    }
}
