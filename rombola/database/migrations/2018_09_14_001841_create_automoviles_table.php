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
            $table->string('marca');
            $table->string('modelo');
            $table->text('version');
            $table->string('color');            
            $table->string('combustible');
            $table->string('chasis_num');
            $table->string('motor_num');     
            $table->string('estado');      
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
        Schema::dropIfExists('automoviles');
    }
}
