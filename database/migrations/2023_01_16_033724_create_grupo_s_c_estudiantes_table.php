<?php

use App\Models\Estudiantes;
use App\Models\GrupoSC;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoSCEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_s_c_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GrupoSC::class)->nullable();
            $table->foreignIdFor(Estudiantes::class)->nullable();
            $table->string("observaciones")->nullable();
            $table->string("observaciones_2")->nullable();
            $table->float("nota_eno")->nullable();
            $table->float("nota_two")->nullable();
            $table->integer("status")->default(1);
            $table->boolean("reprobo")->default(false);
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
        Schema::dropIfExists('grupo_s_c_estudiantes');
    }
}
