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
        Schema::create('autosusados', function (Blueprint $table) {
            $table->increments('id_autoUsado');
            $table->integer('auto_id')->unsigned()->index();
            $table->text('titular');
             $table->string('dominio',10)->unique();
             $table->text('fechaingreso');
            $table->integer('anio');
             $table->integer('estadoUsado_id')->unsigned()->index();
            $table->integer('kilometros')->nullable();
            $table->string('chasis_num')->nullable();
            $table->string('motor_num')->nullable(); 
             $table->string('combustible',10)->nullable();   
            $table->timestamps();
            $table->foreign('auto_id')->references('id_auto')->on('automoviles')->onDelete('cascade');
            $table->foreign('estadoUsado_id')->references('id_estadoUsado')->on('estadousados')->onDelete('cascade');
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
