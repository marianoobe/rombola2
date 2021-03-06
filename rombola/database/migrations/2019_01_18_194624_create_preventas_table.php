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
            $table->integer('preventa_oper')->unsigned();
            $table->foreign('preventa_oper')->references('id_operacion')->on('operaciones');
            $table->text('auto_interesado');
            $table->text('detalles');
            $table->text('usado');
            $table->integer('contado');
            $table->text('otropago')->nullable();
            $table->text('nombretipo');
            $table->text('nomb_financ');
            $table->integer('numcuotas');
            $table->integer('importe_finan');
            $table->integer('cant_pormes');
            $table->text('codigo',11);
            $table->text('cod_part1',4);
            $table->text('cod_part2',4);
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
