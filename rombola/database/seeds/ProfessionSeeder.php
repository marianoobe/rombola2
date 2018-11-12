<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Fabricio Carrio",
            'username' => "zerofabricio",
            'email' => "fabricio@gmail.com",
            'password' => "154054675",

        ]);

        DB::table('users')->insert([
            'name' => "Mariano Benitez",
            'username' => "mariano",
            'email' => "mariano@gmail.com",
            'password' => "mariano12",

        ]);

        $estado_cero = array(
            '0' => "Salón",
            '1' => "Depósito",
            '2' => "En camino",
            '3' => "Baja",
         );
         
         $i=0;
        while ( $i < count($estado_cero)) {
        DB::table('estadoceros')->insert([
            'nombreEstado' => $estado_cero[$i],
        ]);
        $i++;
        }

        $estado_usado = array(
            '0' => "Disponible",
            '1' => "En Trámite",
            '2' => "Baja",
         );

         $j=0;
         while ($j < count($estado_usado)) {
        DB::table('estadousados')->insert([
            'nombreEstado' => $estado_usado[$j],
        ]);
        $j++;
        }

        $marcas = array(
            '0' => "Audi",
            '1' => "BMW",
            '2' => "Chevrolet",
            '3' => "Citroen",
            '4' => "Dodge",
            '5' => "Fiat",
            '6' => "Ford",
            '7' => "Volkswagen",
            '8' => "Peugeot",
            '9' => "Toyota",
            '10' => "Nissan",
            '11' => "Honda",
         );

        $m=0;
        while ($m < count($marcas)) {
        
            DB::table('marcas')->insert([
                'nombre' => $marcas[$m],
            ]);
            $m++;
        }
        

    }
}
