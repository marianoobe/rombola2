<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Cliente;
use App\Persona;
use App\Telefono;
use App\Estado;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client_pers = Persona::Search($request->name)
        ->join('clientes','clientes.cliente_persona','personas.idpersona')
        ->join('telefonos', 'telefonos.personas_telefono', 'personas.idpersona')
        ->where('telefonos.tipo','=', "celular")
        ->where('visible','=', 1)
        ->paginate(6);
        
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
      
          $nombre= $request->get('nombre');
          $apellido = $request->get('apellido');
          $share = new Persona([
            'dni' => $request->get('dni'),
            'nombre' => $request->get('nombre'),
            'apellido'=> $request->get('apellido'),
            'nombre_apellido'=> $nombre." ".$apellido,
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
            'visible'=> 1 ,
            'id_user'=> $request->get('id_user'),
            'fecha'=> date("d-m-Y")
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
            'tipo' => 'fijo'
          ]);
          $tel->save();
        }
          if($cel_1 != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('cel_1'),
            'tipo' => 'celular'
          ]);
          $tel->save();
        }
        /* ++++++++++++++++++++++++++++++++++++++++++++ revisar
        if($cel_2 != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('cel_2'),
            'tipo' => '3'
          ]);
          $tel->save();
        }
        */ //**********************************

        if($cliente->save()){
          return redirect('/clientes')->with('success', 'Cliente Guardado');
        }
        else{
          return redirect('/clientes')->with('danger', 'Error al Guardar');
        }

    }

    public function store_fast(Request $request)
    {
      if ($request->get('email')==null) {
        $email = "";
      }else{
        $email = $request->get('email');
      }

      $nombre= $request->get('nombre');
      $apellido = $request->get('apellido');
      $share = DB::table('personas')
      ->insertGetId([
        'dni' => " ",
        'nombre' => $request->get('nombre'),
        'apellido'=> $request->get('apellido'),
        'nombre_apellido'=> $nombre." ".$apellido,
        'email'=> $email,
        'act_empresa'=> ""
      ]);

      $cliente = new Cliente([
        'cliente_persona' => $share,
        'fecha_nacimiento' => "",
        'domicilio'=> "",
        'estado_civil'=> "",
        'estado_ficha'=> "Incompleta",
        'visible'=> 1,
        'id_user'=>$request->get('id_user'),
        'fecha'=> date("d-m-Y"),
        'interes'=>$request->get('interes'),
        'tipo_auto'=>$request->get('input_tipo_auto')
      ]);

      $cel_1=$request->get('cel_1');
      
      if($cel_1 != null)
      {
      $tel = new Telefono([
        'personas_telefono' => $share,
        'num_tel' => $request->get('cel_1'),
        'tipo' => 'celular'
      ]);
      $tel->save();
    }
     //return redirect('/clientes');
     if($cliente->save()){
      return redirect('/home')->with('success', 'Cliente Guardado');
    }
    else{
      return redirect('/home')->with('danger', 'Error al Guardar');
    }
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

        $client_venta_0km = DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('operaciones','operaciones.persona_operacion','personas.idpersona')
        ->join('ventas','ventas.operacion_venta','operaciones.id_operacion')
        ->join('autoceros','autoceros.id_autocero','ventas.idventa_auto0km')
        ->join('automoviles','automoviles.id_auto','autoceros.auto_id')
        ->join('marcas','marcas.id_marca','automoviles.marca_id') 
        ->where('personas.idpersona','=', $idpers)
        ->get();

        $client_venta_usado = DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('operaciones','operaciones.persona_operacion','personas.idpersona')
        ->join('ventas','ventas.operacion_venta','operaciones.id_operacion')
        ->join('autosusados','autosusados.id_autoUsado','ventas.idventa_autousado')
        ->join('automoviles','automoviles.id_auto','autosusados.auto_id')
        ->join('marcas','marcas.id_marca','automoviles.marca_id') 
        ->where('personas.idpersona','=', $idpers)
        ->get();

        if (count($client_venta_0km)!=0) {
          $auto_comprado = $client_venta_0km;
          return view('shares.edit', compact('client','auto_comprado')); 
        }
        else {
          if (count($client_venta_usado)!=0){
            $auto_comprado = $client_venta_usado;
            return view('shares.edit', compact('client','auto_comprado')); 
          }
          else {
            $auto_comprado = $client_venta_0km;
            return view('shares.edit', compact('client','auto_comprado'));
          }
        }     
      
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
     
      $nombre= $request->get('nombre');
      $apellido = $request->get('apellido');

      DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
            ->where('idpersona',"=",$id)
            ->update([
                "dni" => $request->get('dni'),
                "nombre" => $request->get('nombre'),
                "apellido" => $request->get('apellido'),
                "nombre_apellido" => $nombre." ".$apellido,
                "email" => $request->get('email'),
                "domicilio" => $request->get('domicilio'),
                "act_empresa" => $request->get('act_empresa'),
                "num_tel" => $request->get('num_tel'),
                "fecha_nacimiento" => $request->get('fecha_nacimiento'),
                "estado_civil" => $request->get('estado_civil'),
                "estado_ficha" => "Completa",

        ]);
      return redirect('/clientes')->with('success', 'Cliente Actualizado');   
    }

    public function update_modal(Request $request)
    {
      $nombre= $request->get('nombre');
      $apellido = $request->get('apellido');
      DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
            ->where('nombre_apellido',"=",$nombre." ".$apellido)
            ->update([
                "dni" => $request->get('dni'),
                "nombre" => $request->get('nombre'),
                "apellido" => $request->get('apellido'),
                "nombre_apellido" => $nombre." ".$apellido,
                "email" => $request->get('email'),
                "domicilio" => $request->get('domicilio'),
                "act_empresa" => $request->get('act_empresa'),
                "num_tel" => $request->get('cel_1'),
                "tipo" => "celular",
                "fecha_nacimiento" => $request->get('fecha_nac'),
                "estado_civil" => $request->get('estado_civil'),
                "estado_ficha" => "Completa",

        ]);

        //$wizards = json_encode($client);
        $wizards="Actualizado";
        return response()->json($wizards);
    }

    public function update_modal_financ(Request $request)
    {
      
      $nombre= $request->get('nombre');
      $apellido = $request->get('apellido');
      DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
            ->where('nombre_apellido',"=",$nombre." ".$apellido)
            ->update([
                "dni" => $request->get('dni'),
                "nombre" => $request->get('nombre'),
                "apellido" => $request->get('apellido'),
                "nombre_apellido" => $nombre." ".$apellido,
                "email" => $request->get('email'),
                "domicilio" => $request->get('domicilio'),
                "act_empresa" => $request->get('act_empresa'),
                "num_tel" => $request->get('cel_1'),
                "fecha_nacimiento" => $request->get('fecha_nac'),
                "estado_civil" => $request->get('estado_civil'),
                "estado_ficha" => "Completa",
                "profesion" => $request->get('nuevo_profesion'),
                "relacion_dependencia" => $request->get('check_dependencia'),
                //"num_tel" => $request->get('telefono_empleo'),
                //"tipo" => 3,
                "ingresos_mensuales" => $request->get('ingresos'),
                "nombre_padre" => $request->get('nombre_padre'),
                "nombre_madre" => $request->get('nombre_madre'),
                "domicilio_empleo" => $request->get('nuevo_domicilio_empleo'),
                "antiguedad" => $request->get('nuevo_antiguedad'),
                "ingresos_otros" => $request->get('otros_ingresos'),

        ]);

        //$wizards = json_encode($client);
        $wizards="Actualizado";
        return response()->json($wizards);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    { 
      DB::table('clientes')
      ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
      ->where('idcliente','=',$request->idcliente)
      ->update([
        "visible"=> 0
      ]);
      $wizards="Eliminado";
      return response()->json($wizards);
      //return redirect('/clientes')->with('success', 'Cliente Eliminado');
    }
}