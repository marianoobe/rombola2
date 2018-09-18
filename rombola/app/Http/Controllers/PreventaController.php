<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pre-venta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preventa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $share = new Persona([
            'dni' => $request->get('dni'),
            'nombre' => $request->get('nombre'),
            'apellido'=> $request->get('apellido'),
            'email'=> $request->get('email'),
            'act_empresa'=> $request->get('act_empresa')
          ]);
          $share->save();

          $dni=$request->get('dni');
          
          $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
        
          foreach ($pers as $item) {
            //echo "$item->idpersona";
          }
          $idpers=$item->idpersona;
          $cliente = new Cliente([
            'idpersona' => $idpers,
            'fecha_nacimiento' => $request->get('fecha_nac'),
            'domicilio'=> "Completar",
            'estado_civil'=> "Completar"
          ]);
          $cliente->save();

          $telef= 0;
          $cel_1=$request->get('cel_1');
          $cel_2= 0;

          if($telef != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('tel_fijo'),
            'tipo' => '1'
          ]);
          $tel->save();
        }
          if($cel_1 != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('cel_1'),
            'tipo' => '2'
          ]);
          $tel->save();
        }
        if($cel_2 != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('cel_2'),
            'tipo' => '3'
          ]);
          $tel->save();
        }

        $preventa = new Preventa([
            'idpersona' => $idpers,
            'fecha_nacimiento' => $request->get('fecha_nac'),
            'domicilio'=> "Completar",
            'estado_civil'=> "Completar"
          ]);
          $preventa->save();

        return redirect('/pre-venta')->with('success', 'Preventa Guardada');
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
