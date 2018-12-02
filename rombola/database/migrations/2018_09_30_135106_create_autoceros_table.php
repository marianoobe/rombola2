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
            $table->string('vin',20)->unique()->nullable();
            $table->integer('auto_id')->unsigned()->index();          
            $table->integer('estadoCero_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('auto_id')->references('id_auto')->on('automoviles')->onDelete('cascade');
            $table->foreign('estadoCero_id')->references('id_estadoCero')->on('estadoCeros')->onDelete('cascade');
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
