<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantidadCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_cuotas', function (Blueprint $table) {
            $table->increments('idcant');
            $table->text('numcuotas');
            $table->integer('idcant_financ')->unsigned();
            $table->foreign('idcant_financ')->references('idfinanciera')->on('financieras');
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
        Schema::dropIfExists('cantidad_cuotas');
    }
}
