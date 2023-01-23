<?php

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
            $table->integer('estado')->comment("0 = pendiente, 1 = Finalizado");
            $table->integer('total_studiante')->nullable();
            $table->integer('status')->comment("1 Face N1, Face N2");
            $table->foreignId('id_grupo_estudiante');
            $table->foreignId('id_grupo_file');
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