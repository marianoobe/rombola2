<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Cliente;
use App\Persona;
use App\Telefono;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_pers = DB::table('clientes')
        ->join('personas','personas.idpersona','clientes.cliente_persona')
        ->join('telefonos', 'telefonos.personas_telefono', 'personas.idpersona')
        ->where('telefonos.tipo','=', 2)
        ->paginate(3);


        return view('clientes',compact('client_pers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {          
        return view('shares.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*$request->validate([
            'domicilio'=> 'required|text',
            'estado_civil' => 'required|text'
          ]);*/
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
            'cliente_persona' => $idpers,
            'fecha_nacimiento' => $request->get('fecha_nac'),
            'domicilio'=> $request->get('domicilio'),
            'estado_civil'=> $request->get('estado_civil'),
            'estado_ficha'=> "Completa",
            'visible'=> 1
          ]);
          $cliente->save();

          $telef=$request->get('tel_fijo');
          $cel_1=$request->get('cel_1');
          $cel_2=$request->get('cel_2');

          if($telef != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('tel_fijo'),
            'tipo' => '1'
          ]);
          $tel->save();
        }
          if($cel_1 != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('cel_1'),
            'tipo' => '2'
          ]);
          $tel->save();
        }
        if($cel_2 != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('cel_2'),
            'tipo' => '3'
          ]);
          $tel->save();
        }
         //return redirect('/clientes');
          return redirect('/clientes')->with('success', 'Cliente Guardado');

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
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
      $dnipers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      foreach ($dnipers as $item) {
        //echo "$item->idpersona";
      }
      $idpers=$item->idpersona;

      $client = DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
        ->where('personas.idpersona','=', $idpers)
        ->get();
      
      return view('shares.edit', compact('client'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
            ->where('idpersona',"=",$id)
            ->update([
                "dni" => $request->get('dni'),
                "nombre" => $request->get('nombre'),
                "apellido" => $request->get('apellido'),
                "email" => $request->get('email'),
                "domicilio" => $request->get('domicilio'),
                "act_empresa" => $request->get('act_empresa'),
                "num_tel" => $request->get('num_tel'),
                "fecha_nacimiento" => $request->get('fecha_nacimiento'),
                "estado_civil" => $request->get('estado_civil'),

        ]);
      return redirect('/clientes')->with('success', 'Stock has been updated');   
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