<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConyugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conyuges', function (Blueprint $table) {
            $table->increments('idgarante');
            $table->integer('idconyuge_persona')->unsigned();
            $table->foreign('idconyuge_persona')->references('idpersona')->on('personas');
            $table->string('fecha_nacimiento');
            $table->text('domicilio');
            $table->text('relacion_dependencia');
            $table->text('antiguedad');
            $table->text('ingresos_mesuales');
            $table->text('ingresos_otros');
            $table->text('nombre_padre');
            $table->text('nombre_madre');
            $table->boolean('visible');
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
        Schema::dropIfExists('conyuges');
    }
}
