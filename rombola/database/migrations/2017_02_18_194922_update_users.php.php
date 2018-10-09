<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         

         Schema::table('users', function ($table) {
<<<<<<< HEAD
             /*$table->string('nombres', 60);
             $table->string('apellidos', 60);
             $table->string('telefono', 60);*/
=======
             $table->string('nombres', 60)->nullable();
             $table->string('apellidos', 60)->nullable();
             $table->string('telefono', 60)->nullable();
>>>>>>> c07ab8b0446466e7febba09b463dbb87ab2c2655
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
