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
            $table->integer('id_auto')->unsigned()->index();
            $table->text('titular');
            $table->integer('anio');
            $table->integer('kilometros');
            $table->string('chasis_num')->nullable();
            $table->string('motor_num')->nullable(); 
            $table->timestamps();
            $table->foreign('id_auto')->references('id_auto')->on('automoviles')->onDelete('cascade');
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
