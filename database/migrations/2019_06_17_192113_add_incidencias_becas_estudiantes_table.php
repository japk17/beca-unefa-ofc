<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncidenciasBecasEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_becas_estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_beca_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->string('explication');
            $table->foreign('type_beca_id')->references('id')->on('type_becas')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->unsigned();
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
        Schema::dropIfExists('incidencias_becas_estudiantes');
    }
}
