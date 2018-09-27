<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancierasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financieras', function (Blueprint $table) {
            $table->increments('idfinanciera');
            $table->text('nomb_financ');
            $table->integer('idtipofinanciera')->unsigned();
            $table->foreign('idtipofinanciera')->references('idtipo')->on('tipo_financieras');
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
        Schema::dropIfExists('financieras');
    }
}
