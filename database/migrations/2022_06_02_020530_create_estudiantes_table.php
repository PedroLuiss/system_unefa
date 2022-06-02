<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula');
            $table->string('estudiante');
            $table->string('nucleo');
            $table->string('cod_carrera');
            $table->string('carrera');
            $table->date('fe_ingreso');
            $table->date('inicio_programa');
            $table->char('sexo');
            $table->char('sanguineo');
            $table->string('edo_civil');
            $table->string('condicion');
            $table->string('etnia');
            $table->string('discapacidad');
            $table->string('pais');
            $table->date('fe_nac');
            $table->string('lugar_nac');
            $table->string('ciudad');
            $table->string('direccion');
            $table->integer('tel_hab');
            $table->integer('tel_cel');
            $table->string('email');
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
        Schema::dropIfExists('estudiantes');
    }
}
