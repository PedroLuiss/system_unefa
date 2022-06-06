<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expedientes_id')->nullable()->constrained('expedientes')->onDelete('cascade');
            $table->foreignId('estudiantes_id')->nullable()->constrained('estudiantes')->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('name_file');
            $table->string('file_url');
            $table->string('path');
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
        Schema::dropIfExists('expediente_files');
    }
}
