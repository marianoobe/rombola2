<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutocerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoceros', function (Blueprint $table) {
           
             $table->increments('id_autocero');           
            $table->string('vin',20)->unique();
            $table->integer('idmarca')->unsigned()->index();                   
            $table->string('modelo',60);
            $table->text('descripcion');
            $table->string('color',10);        
         
            $table->integer('precio')->nullable();
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
        Schema::dropIfExists('autocero');
    }
}
