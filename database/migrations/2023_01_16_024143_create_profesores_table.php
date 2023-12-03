<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->text('foto')->nullable();
            $table->string('especialidad');
            $table->string('tipo_perfil')->nullable()->comment("INDIQUE SI ES ADMINISTRATIVO Ó DOCENTE");
            $table->string('tipo_perfil_unidad_admi')->nullable()->comment("EN CASO DE SER ADMINISTRATIVO INDIQUE UNIDAD A LA QUE PERTENECE");
            $table->string('tipo_perfil_unidad_doce')->nullable()->comment("EN CASO DE SER DOCENTE INDIQUE LA CATEGORÍA");
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
        Schema::dropIfExists('profesores');
    }
}
