<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tipo');
            $table->text('mensaje');
            $table->integer('idvendedor')->unsigned();
            $table->foreign('idvendedor')->references('id')->on('users');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('idcliente')->on('clientes');
            $table->text('estado');
            $table->text('motivo');
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
        Schema::dropIfExists('notificacions');
    }
}
