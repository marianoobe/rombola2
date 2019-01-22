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
            $table->integer('idconyuge')->nullable();
            $table->integer('idgarante')->nullable();
            $table->string('fecha_nacimiento');
            $table->string('domicilio', 50);
            $table->text('estado_civil',30);
            $table->boolean('relacion_dependencia')->nullable();
            $table->text('antiguedad',20)->nullable();
            $table->text('ingresos_mensuales',20)->nullable();
            $table->text('ingresos_otros',30)->nullable();
            $table->text('nombre_padre',30)->nullable();
            $table->text('nombre_madre',30)->nullable();
            $table->text('estado_ficha',30);
            $table->boolean('visible');
            $table->integer('id_user');
            $table->text('interes',30)->nullable();
            $table->text('tipo_auto',30)->nullable();
            $table->text('fecha')->nullable();
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
