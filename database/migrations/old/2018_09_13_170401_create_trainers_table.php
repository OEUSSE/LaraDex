<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     * Este método ejecuta la migración y crear la tabla.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            // Comandos para generar atributos en la tabla
            // tabla->tipoDato->valor
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Este método elimina la tabla
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}
