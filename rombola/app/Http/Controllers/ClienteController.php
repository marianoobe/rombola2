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
        ->join('personas','personas.idpersona','clientes.idpersona')
        ->join('telefonos', 'telefonos.idpersona', 'personas.idpersona')
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
            'idpersona' => $idpers,
            'fecha_nacimiento' => $request->get('fecha_nac'),
            'domicilio'=> $request->get('domicilio'),
            'estado_civil'=> $request->get('estado_civil')
          ]);
          $cliente->save();

          $telef=$request->get('tel_fijo');
          $cel_1=$request->get('cel_1');
          $cel_2=$request->get('cel_2');

          if($cel_1 != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('tel_fijo')
          ]);
          $tel->save();
        }
          if($cel_1 != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('cel_1')
          ]);
          $tel->save();
        }
        if($cel_2 != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('cel_2')
          ]);
          $tel->save();
        }
         //return redirect('/clientes');
          return redirect('/clientes')->with('success', 'Stock has been added');

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
        ->join('personas', 'personas.idpersona' ,'clientes.idpersona')
        ->join('telefonos','telefonos.idpersona','personas.idpersona')
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
    public function update(Request $request, $dni)
    {
      //$pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      $share = Cliente::select($dni);
      $share->dni = $request->get('dni');
      $share->nombre = $request->get('nombre');
      $share->apellido = $request->get('apellido');
      $share->save();
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