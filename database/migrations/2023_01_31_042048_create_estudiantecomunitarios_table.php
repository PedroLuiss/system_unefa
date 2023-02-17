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
            $table->integer('turno')->nullable();
            $table->string('seccion')->nullable();
            $table->integer('fase')->default(1)->comment("1= Face N1, 2=Face N2, 3=Completado");
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
