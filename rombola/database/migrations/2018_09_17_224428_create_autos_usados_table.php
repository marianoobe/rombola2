<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosUsadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autosUsados', function (Blueprint $table) {
            $table->increments('id_autoUsado');
           $table->integer('id_auto');
            $table->string('dominio');
            $table->text('titular');
            $table->integer('anio');
            $table->integer('kilometros');
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
        Schema::dropIfExists('autosUsados');
    }
}
