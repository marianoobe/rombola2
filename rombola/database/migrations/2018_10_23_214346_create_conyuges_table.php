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
            $table->text('relacion_dependencia')->nullable();
            $table->text('antiguedad')->nullable();
            $table->text('ingresos_mesuales')->nullable();
            $table->text('ingresos_otros')->nullable();
            $table->text('nombre_padre')->nullable();
            $table->text('nombre_madre')->nullable();
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
