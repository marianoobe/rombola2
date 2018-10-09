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
            $table->integer('vin')->unique()->nullable();
            $table->string('dominio',15)->unique()->nullable();
            $table->string('marca',30);
            $table->string('modelo',60);
            $table->text('version');
            $table->string('color',10);            
            $table->string('combustible',10);               
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
