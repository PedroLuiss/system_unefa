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
            $table->integer('cedula',10);
            $table->string('estudiante',60);
            $table->string('nucleo',60);
            $table->string('cod_carrera',['1320D','1309D','1322D','1326D','1310D','1303D','1320N','1309N','1322N','1326N','1310N','1303N']);
            $table->string('carrera',60);
            $table->date('fe_ingreso');
            $table->date('inicio_programa');
            $table->char('sexo',1);
            $table->char('sanguineo',3);
            $table->string('edo_civil',60);
            $table->string('condicion',60);
            $table->string('etnia',60);
            $table->string('discapacidad',60);
            $table->string('pais',60);
            $table->date('fe_nac');
            $table->string('lugar_nac');
            $table->string('ciudad',60);
            $table->string('direccion');
            $table->integer('tel_hab',10);
            $table->integer('tel_cel',10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullabsle();
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
