<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantecomunitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantecomunitarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiantes_id');
            $table->integer('semestre')->nullable();
            $table->string('turno')->nullable();
            $table->string('seccion')->nullable();
            $table->boolean('all_fase')->default(false)->comment("true->saber si esta viendo las dos fases, false-> solo una fase");
            $table->integer('fase')->default(1)->comment("1= Face N1, 2=Face N2, 3=Completado");
            $table->double('nota_one')->nullable()->comment("La nota de la fase 1");
            $table->double('nota_twe')->nullable()->comment("La nota de la fase 2");
            $table->longText('observacion_fase_one')->nullable();
            $table->longText('observacion_fase_twe')->nullable();
            $table->boolean('tiene_grupo')->default(false)->comment("Saber si tiene un grupo false:No, True:Ss");

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
        Schema::dropIfExists('estudiantecomunitarios');
    }
}
