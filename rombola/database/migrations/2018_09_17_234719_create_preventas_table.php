<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preventas', function (Blueprint $table) {
            $table->increments('idpreventa');
            $table->text('auto_interesado');
            $table->text('detalles');
            $table->text('usado');
            $table->integer('contado');
            $table->integer('cheques');
            $table->text('tipo_financiación');
            $table->text('financieras');
            $table->integer('cant_cuotas');
            $table->integer('importe_finan');
            $table->integer('cant_pormes');
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
        Schema::dropIfExists('preventas');
    }
}
