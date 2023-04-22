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
            $table->string('cedula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('carreras_id')->nullable();
            $table->date('fe_ingreso')->nullable();
            $table->date('inicio_programa')->nullable();
            $table->char('sexo')->nullable();
            $table->char('sanguineo')->nullable();
            $table->string('edo_civil')->nullable();
            $table->string('condicion')->nullable();
            $table->string('nucleo')->nullable();
            $table->string('etnia')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('pais')->nullable();
            $table->date('fe_nac')->nullable();
            $table->string('lugar_nac')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('tel_hab')->nullable();
            $table->string('tel_cel')->nullable();
            $table->string('email')->nullable();
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
