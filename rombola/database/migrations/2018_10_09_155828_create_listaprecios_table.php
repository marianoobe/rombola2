<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListapreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listaprecios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marca_id')->unsigned();           
            $table->string('rutalista');
            $table->string('rutaimagen')->nullable();
            $table->string('fechalista',10);
            $table->timestamps();
            $table->foreign('marca_id')->references('id_marca')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_precios');
    }
}
