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
            $table->string('nombre_proyecto')->nullable();
            $table->integer('estado')->comment("0 = pendiente, 1 = Finalizado");
            $table->integer('total_studiante')->nullable();
            $table->integer('status')->comment("1 Face N1, Face N2");
            $table->boolean('archivo_subido')->default(0);
            $table->boolean('nota_evaluada_one')->default(0);
            $table->boolean('nota_evaluada_twe')->default(0);
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
