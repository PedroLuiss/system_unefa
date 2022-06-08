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
            $table->id();
            $table->integer('cedula');
            $table->string('nombres')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('carreras_id');
            $table->date('fe_ingreso');
            $table->date('inicio_programa');
            $table->char('sexo');
            $table->char('sanguineo');
            $table->string('edo_civil');
            $table->string('condicion');
            $table->string('nucleo');
            $table->string('etnia');
            $table->string('discapacidad');
            $table->string('pais');
            $table->date('fe_nac');
            $table->string('lugar_nac');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('tel_hab');
            $table->string('tel_cel');
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
