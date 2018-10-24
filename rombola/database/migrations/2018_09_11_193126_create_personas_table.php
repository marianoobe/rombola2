<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('idpersona');
            $table->integer('dni');
            $table->text('nombre', 20);
            $table->text('apellido', 20);
            $table->text('nombre_apellido', 30);
            $table->text('email');
            $table->text('act_empresa', 25);
            $table->text('domicilio_empleo', 30)->nullable();
            $table->text('profesion', 25)->nullable();
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
        Schema::dropIfExists('personas');
    }
}
