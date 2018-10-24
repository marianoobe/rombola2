<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('idcliente');
            $table->integer('cliente_persona')->unsigned();
            $table->foreign('cliente_persona')->references('idpersona')->on('personas');
            $table->string('fecha_nacimiento');
            $table->string('domicilio', 50);
            $table->text('estado_civil');
            $table->boolean('relacion_dependencia')->nullable();
            $table->text('antiguedad')->nullable();
            $table->text('ingresos_mesuales')->nullable();
            $table->text('ingresos_otros')->nullable();
            $table->text('nombre_padre')->nullable();
            $table->text('nombre_madre')->nullable();
            $table->text('estado_ficha');
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
        Schema::dropIfExists('clientes');
    }
}
