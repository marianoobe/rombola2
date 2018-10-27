<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutomovilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automoviles', function (Blueprint $table) {
            $table->increments('id_auto');     
          
            $table->integer('marca_id')->unsigned()->index();                   
            $table->string('modelo',60);
            $table->text('version');
            $table->string('color',10);              
            $table->string('ficha');
            $table->integer('precio');
            $table->boolean('visible');           
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
        Schema::dropIfExists('automoviles');
    }
}
