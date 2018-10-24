<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('idventa');
            $table->text('codigo',11);
            $table->text('cod_part1',4);
            $table->text('cod_part2',4);
            $table->integer('operacion_venta')->unsigned();
            $table->foreign('operacion_venta')->references('id_operacion')->on('operaciones');
            $table->integer('idventa_autousado')->unsigned()->nullable();
            $table->foreign('idventa_autousado')->references('id_autoUsado')->on('autosusados');
            $table->integer('idventa_auto0km')->unsigned()->nullable();
            $table->foreign('idventa_auto0km')->references('id_auto')->on('automoviles');
            $table->integer('precio_auto_vendido');
            $table->integer('efectivo');
            $table->integer('resto');
            $table->boolean('visible');
            $table->text('estado');
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
        Schema::dropIfExists('ventas');
    }
}
