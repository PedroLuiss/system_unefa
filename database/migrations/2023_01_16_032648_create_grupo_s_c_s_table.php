<?php

use App\Models\carrera;
use App\Models\Profesore;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoSCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_s_c_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profesore::class)->nullable();
            $table->foreignIdFor(carrera::class)->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->string('nombre_comunidad')->nullable()->comment("Nombre de la comunidad o institucional");
            $table->string('nombre_tutor_comunitario')->nullable()->comment("Nombre del tutor comunitario");
            $table->string('cedula_tutor_comunitario')->nullable()->comment("cedula del tutor comunitario");
            $table->string('telefono_tutor_comunitario')->nullable()->comment("telefono del tutor comunitario");
            $table->string('vinc_project_planes_prog')->nullable()->comment("VINCULACIÓN DEL PROYECTO CON LOS PLANES, PROGRAMAS  Y/O PROYECTOS, ESTABLECIDOS POR EL EJECUTIVO NACIONA");
            $table->string('area_accion_project')->nullable()->comment("INDIQUE ÁREA DE ACCIÓN DEL PROYECTO (AMBIENTAL, SOCIOPRODUCTIVO, TECNOLOGICO, SOCIAL, EDUCATIVO, SOCIO-COMUNITARIO, ENTRE OTROS) SOLO COLOCAR UN NOMBRE");
            $table->integer('cant_beneficiados')->default(0)->comment("CANTIDAD DE BENEFICIADOS (SOLO NÚMEROS)");
            $table->boolean('foros')->default(0);
            $table->boolean('charlas')->default(0);
            $table->boolean('jornadas')->default(0);
            $table->boolean('talleres')->default(0);
            $table->boolean('campanas')->default(0)->comment("Campañas");
            $table->boolean('reunion_misiones')->default(0)->comment("REUNIÓN CON MISIONES");
            $table->boolean('ferias')->default(0);
            $table->boolean('alianzas_estrategicas')->default(0);
            $table->longText('direccion_comunidad')->nullable()->comment("La direccion de la comunidad");
            $table->integer('estado')->comment("0 = pendiente, 1 = Finalizado");
            $table->integer('total_studiante')->nullable();
            $table->integer('status')->comment("1= Face N1, 2=Face N2, 3=Completado");
            $table->boolean('archivo_subido')->default(0);
            $table->boolean('nota_evaluada_one')->default(0);
            $table->boolean('nota_evaluada_twe')->default(0);
            $table->boolean('exportar_exel')->default(0);
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
        Schema::dropIfExists('grupo_s_c_s');
    }
}
