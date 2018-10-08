<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantes', function (Blueprint $table) {
            $table->increments('idgarante');
            $table->integer('idgarante_persona')->unsigned();
            $table->foreign('idgarante_persona')->references('idpersona')->on('personas');
            $table->string('fecha_nacimiento');
            $table->text('domicilio');
            $table->text('estado_civil');
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
        Schema::dropIfExists('garantes');
    }
}
