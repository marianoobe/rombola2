<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaPrecioController extends Controller
{

    public function importChevrolet() 
    {
        $format= $request->get("formato");
        dd("AAAAAAAANDA");

        dd($format);
        /** El método load permite cargar el archivo definido como primer parámetro */
        Excel::load('Chevrolet-modificada'.'xlsx', function ($reader) {
            /**
             * $reader->get() nos permite obtener todas las filas de nuestro archivo
             */
            foreach ($reader->get() as $key => $row) {
                $crevrolet = [
                    'modelos' => $row['modelos'],
                    'descripcion' => $row['descripcion'],
                    'precio' => $row['precio'],
                ];
                /** Una vez obtenido los datos de la fila procedemos a registrarlos */
                if (!empty($producto)) {
                    DB::table('chevrolet')->insert($crevrolet);
                }
            }
            echo 'La lista se cargó exitosamente';
        });

        return view('lista-precios');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lista-precios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listaprecios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("store");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
