<?php

use App\Models\Estudiantes;
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
            $table->foreignIdFor(Estudiantes::class)->nullable();
            $table->string("observaciones")->nullable();
            $table->float("nota")->nullable();
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
