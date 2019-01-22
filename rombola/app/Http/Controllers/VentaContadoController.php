<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoFinanciera;
use App\Persona;
use App\Automovile;
use App\Marca;
use App\Autocero;
use DB;
use App\Cliente;
use App\Telefono;
use App\Operaciones;
use App\Conyuge;
use App\Venta;
use App\Autosusado;
use App\Estadocero;
use App\Estadousado;
use App\Estado;



class VentaContadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_finan = TipoFinanciera::pluck('nombretipo');
        $nombapell = Persona::pluck('nombre_apellido');

        $autos=Automovile::select("*")   
        ->join('marcas','marcas.id_marca','automoviles.marca_id')
        ->join('autoceros','autoceros.auto_id','automoviles.id_auto')
        ->paginate(5);
        
       $auto_usado=Automovile::select("*")     
       ->join('marcas','marcas.id_marca','automoviles.marca_id')
       ->join('autosusados','autosusados.auto_id','automoviles.id_auto')
       ->paginate(5);
       

       $marcas=Marca::All();

        return view('venta-contado.create',compact('tipo_finan','nombapell','autos','marcas','auto_usado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
      $nombre = $request->get('nuevo_nombre');
      $apellido = $request->get('nuevo_apellido');

      $can = $request->get('cancer');

      if ($can == 'nuevo') {
        
      //insert Persona-Cliente ******************************************

      $share = new Persona([
        'dni' => $request->get('nuevo_dni'),
        'nombre' => $request->get('nuevo_nombre'),
        'apellido'=> $request->get('nuevo_apellido'),
        'nombre_apellido'=> $nombre." ".$apellido,
        'email'=> $request->get('nuevo_email'),
        'act_empresa'=> $request->get('nuevo_act_empresa'),
        'domicilio_empleo'=> $request->get('nuevo_domicilio_empleo'),
        'profesion'=> $request->get('nuevo_profesion')

      ]);
      $share->save();

      $dni=$request->get('nuevo_dni');
      
      $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
    
      foreach ($pers as $item) {}

      $idpers=$item->idpersona;
      $cliente = new Cliente([
        'cliente_persona' => $idpers,
        'fecha_nacimiento' => $request->get('nuevo_fecha_nac'),
        'domicilio'=> $request->get('nuevo_domicilio'),
        'estado_civil'=> $request->get('nuevo_estado_civil'),
        'relacion_dependencia'=> $request->get('relacion_dependencia'),
        'antiguedad'=> $request->get('nuevo_antiguedad'),
        'ingresos_mesuales'=> $request->get('nuevo_ingresos_mesuales'),
        'nombre_padre'=> $request->get('nuevo_nombre_padre'),
        'nombre_madre'=> $request->get('nuevo_nombre_madre'),
        'estado_ficha'=> "Completa",
        'visible'=> true,
        'id_user'=> $request->get('id_user'),
        'fecha'=> date("d-m-Y")
      ]);
      $cliente->save();

      //--/insert Persona-Cliente ******************************************

      if($request->get('nuevo_cel_1') != null)
      {
      $tel = new Telefono([
        'personas_telefono' => $idpers,
        'num_tel' => $request->get('nuevo_cel_1'),
        'tipo' => 'celular'
      ]);
      $tel->save();
      }

      if($request->get('nuevo_otro') != null)
      {
      $tel = new Telefono([
        'personas_telefono' => $idpers,
        'num_tel' => $request->get('nuevo_otro'),
        'tipo' => 'fijo'
      ]);
      $tel->save();
      }

      $idcliente= Cliente::where('cliente_persona','=',$idpers)->select('idcliente')->get();

      $id_estado = Estado::where("nomb_estado","=","Administración")->select("id_estado")->get();

      $fecha_oper=$request->get('fecha_oper');
      $operacion = new Operaciones([
        'persona_operacion' => $idpers,
        'estado' => $id_estado,
        'fecha_oper'=> $fecha_oper,
        'aviso'=> 0,
        'visible' => 1,
      ]);
      $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      $operacion->save();
      }
      else
      {

        $nya = $request->get('nya_cliente');
        $idpersona = Persona::where("nombre_apellido","=",$nya)->select("idpersona","dni")->get();
        
        
        foreach ($idpersona as $items) {}
          $idpersona = $items->idpersona;
          $dni=$items->dni;
        
        //$idcliente = Cliente::where("cliente_persona","=",$idpersona)->select('idcliente')->get();

        $id_estado = Estado::where("nomb_estado","=","Administración")->select("id_estado")->get();
        foreach ($id_estado as $item_estado) {}

        $fecha_oper=$request->get('fecha_oper');
        $operacion = new Operaciones([
        'persona_operacion' => $idpersona,
        'estado' => $item_estado->id_estado,
        'fecha_oper'=> $fecha_oper,
        'aviso'=> false,
        'visible' => true,
        ]);
       $operacion->save();

      }
    
      if($request->get('input_conyuge')=="si")
      {

     //insert Persona-Conyuge ******************************************

       $nombre_conyuge = $request->get('conyuge_nombre');
       $apellido_conyuge = $request->get('conyuge_apellido');

       $can = $request->get('input_conyuge');
       if ($can == 'si') {

       $share = new Persona([
          'dni' => $request->get('conyuge_dni'),
          'nombre' => $request->get('conyuge_nombre'),
          'apellido'=> $request->get('conyuge_apellido'),
          'nombre_apellido'=> $nombre_conyuge." ".$apellido_conyuge,
          'email'=> "",
          'act_empresa'=> $request->get('conyuge_act_empresa'),
          'domicilio_empleo'=> $request->get('conyuge_domicilio_empleo'),
          'profesion'=> $request->get('conyuge_profesion')
        ]);
        $share->save();

        $dni_conyuge=$request->get('conyuge_dni');
        
        $pers = Persona::where("dni","=",$dni_conyuge)->select("idpersona")->get();
      
        foreach ($pers as $item) {
          //echo "$item->idpersona";
        }
        $idpers=$item->idpersona;
        //--insert Persona-Conyuge  ******************************************
 
        $conyuge = new Conyuge([
          'idconyuge_persona' => $idpers,
          'fecha_nacimiento' => $request->get('conyuge_fecha_nac'),
          'domicilio'=> $request->get('conyuge_domicilio'),
          'estado_civil'=> $request->get('conyuge_estado_civil'),
          'visible'=> 1,
        ]);
        $conyuge->save();

        $idconyuge = Conyuge::where("idconyuge_persona","=",$idpers)->select("idconyuge")->get();

        foreach ($idconyuge as $item1) {}
        foreach ($idcliente as $item2) {}

        DB::table('clientes')
        ->where('idcliente','=',$item2->idcliente)
        ->update(['idconyuge'=>$item1->idconyuge]);

        if($request->get('conyuge_cel_1') != null)
        {
        $tel = new Telefono([
          'personas_telefono' => $idpers,
          'num_tel' => $request->get('conyuge_cel_1'),
          'tipo' => '2'
        ]);
        $tel->save();
        }

        }
      }
      //--/insert Persona-Garante
      /*
      $nombre_garante = $request->get('garante_nombre');
      $apellido_garante = $request->get('garante_apellido');

      $can = $request->get('check_garante');
      if ($can == 'si') {

        $share = new Persona([
            'dni' => $request->get('garante_dni'),
            'nombre' => $request->get('garante_nombre'),
            'apellido'=> $request->get('garante_apellido'),
            'nombre_apellido'=> $nombre_garante." ".$apellido_garante,
            'email'=> "",
            'act_empresa'=> $request->get('garante_act_empresa')
          ]);
          $share->save();
  
          $dni=$request->get('garante_dni');
          
          $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
        
          foreach ($pers as $item) {
            //echo "$item->idpersona";
          }
          $idpers=$item->idpersona;
          //insert Persona-Garante
          $garante = new Garante([
            'idpersona' => $idpers,
            'fecha_nacimiento' => $request->get('garante_fecha_nac'),
            'domicilio'=> $request->get('garante_domicilio'),
            'estado_civil'=> $request->get('garante_estado_civil')
          ]);
          $garante->save();

          if($request->get('garante_cel_1') != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('garante_cel_1'),
            'tipo' => '2'
          ]);
          $tel->save();
          }

          }

          */

          /*insert Auto 0 KM -------*/

          //dd("salida".$request->get('estado_toggle'));
          $idauto0km=null;
          if ($request->get('estado_toggle')=="stock") {
            
          $idauto0km = $request->get('select_cero');

          } else {

            if ($request->get('estado_toggle')=="lista") {
      
            $idmarca=$request->get('marca');
                  

            $marca = Marca::where("nombre","=",$idmarca)->select("id_marca")->get();
            
            foreach ($marca as $item) {}   
                  
            $idmarcas=$item->id_marca;

            $automovil = new Automovile([
              'marca_id' => $idmarcas, 
              'modelo' => $request->input('modelo'),
              'version'=> $request->input('version'),
              'color'=> '',      
              'precio'=> 0,  
              'ficha' => 'Incompleta',
              'visible'=> 1
               ]);
              
              $automovil->save();
            
              $id0km = DB::table('automoviles')
              ->select('id_auto')
              ->orderBy('created_at','DESC')
              ->take(1)
              ->get();  

            foreach ($id0km as $key) {}

            $marca = Estadocero::where("nombreEstado","=","En Camino")->select("id_estadoCero")->get();
            foreach ($marca as $marc) {}
            
            $auto_cero = DB::table('autoceros')
            ->insertGetId([
            'vin' => null,
            'auto_id' => $key->id_auto, 
            'estadoCero_id'=> $marc->id_estadoCero
             ]);
            // dd($save);

            $idauto0km = $auto_cero;
          }
        }

          //insert Auto Usado -------******************************************
          $idusado=null;
        if ($request->get('check_usado')=="si") {
          $idusado = $request->get('check_select_usado');
          $consulta = Autosusado::where("dominio","=",$idusado)->select("id_autoUsado")->get();
          foreach ($consulta as $item) {}
          $idusado = $item->id_autoUsado;
          }
          else{
            $idusado = null;
          }

                      

           if($request->get('valor_entregado')=="si"){

            $marca_entregado=$request->get('marca_entregado');
            
            $idmarca = Marca::where("nombre","=",$marca_entregado)->select("id_marca")->get();
        
            foreach ($idmarca as $item) {}         
            $idmarcas=$item->id_marca;

            $usado = DB::table('automoviles')
            ->insertGetId([
              'marca_id' => $idmarcas, 
              'modelo' => $request->get('modelo_entregado'),
              'version'=> $request->get('version_entregado'),
              'color'=> $request->get('color_entregado'),
              'precio'=> $request->get('valor_auto_entregado'),                
              'ficha'=> "Incompleta",
              'visible'=> 1
            ]);
            
            $estado_usado = Estadousado::where("nombreEstado","=","En Trámite")->select("id_estadoUsado")->get();
            foreach ($estado_usado as $key) {}

            $fecha_ingreso = date("d-m-Y");
            
            $idauto=$item->id_auto;
            
            $nuevo_usado = DB::table('autosusados')
            ->insertGetId([
              'auto_id' => $usado,            
              'titular'=> $request->get('nomb_titular_entregado'),
              'anio' => $request->get('anio_entregado'),
              'kilometros' => 0,
              'dominio' => $request->get('dominio_entregado'),
              'chasis_num'=> $request->get('chasis_num_entregado'),
              'motor_num'=> $request->get('motor_num_entregado'),
              'estadoUsado_id' => $key->id_estadoUsado,
              'combustible' => "",
              'fechaingreso' => $fecha_ingreso,
            ]);
            //$nuevo_usado->save(); 


            //insert Auto Entregado -------****************************************** 

            $id_autoentragado = $nuevo_usado;

            }
            else{
              $id_autoentragado=null;
            }

            //insert Venta -------
            $p = DB::table('ventas')
            ->select('codigo','cod_part1','cod_part2')
            ->orderBy('created_at','DESC')
            ->take(1)
            ->get();
            $cant=count($p);

            if ($cant==0) {
        
            $part1 = '000';
            $part2 = '001';
            $codigo = "V-".$part1."-".$part2 ;
            }
            else {
            foreach ($p as $itemcod) {}
            $part1 = $itemcod->cod_part1;
            $part2 = (int)$itemcod->cod_part2;

            if ($part2 <100) {
                $part2 = "00".($part2+1);
            }
            else {
                $part2 = (string)($part2+1);
            }

            $codigo = "V-"."000"."-".$part2 ;
            }


          $venta_operac = DB::table('operaciones')
          ->select('id_operacion')
          ->join('personas','operaciones.persona_operacion','personas.idpersona')
          ->where('personas.dni','=', $dni)
          ->orderBy('id_operacion','DESC')
          ->take(1)
          ->get();
          
          $total = $request->get('restotal');
          $valor_auto = $request->get('valor_auto_vendido');
          $resto = $total - $valor_auto;
          
          foreach ($venta_operac as $item) {}
            //dd($item->id_operacion);
          
          $venta = DB::table('ventas')
          ->insertGetId([
          'operacion_venta' => $item->id_operacion,
          'idventa_autousado' => $idusado,
          'idventa_auto0km' => $idauto0km,
          'idventa_autoentregado' => $id_autoentragado,
          'precio_auto_vendido' => $request->get('valor_auto_vendido'),
          'efectivo' => $request->get('inpefectivo'),
          'cod_part1' => $part1,
          'cod_part2' => $part2,
          'codigo' => $codigo,
          'resto' =>$resto,
          'visible' =>1,
          'id_user'=> $request->get('id_user'),
          'tipo'=> "Contado"
          ]);

         
          //insert Cheque -------****************************************** 
          $cheque = $request->get('valor_cheque');
          if ($cheque == 'si') {

            $chequenuevo = DB::table('cheques')
            ->insertGetId([
              'cheque_venta' => $venta,
              'numero' => $request->get('numero_cheque'),
              'fecha' => $request->get('fecha_cheque'),
              'banco' => $request->get('banco'),
              'importe' => $request->get('importe_cheque'),
              'estado' => "",
              ]);
          }
         //--insert Cheque -------****************************************** 


      return redirect('/venta')->with('success', 'Venta Guardada');
    }
    
    public function estado_cliente(Request $request){
      $estado_ficha= Cliente::select('estado_ficha')
      ->join('personas','personas.idpersona','clientes.cliente_persona')
      ->where('nombre_apellido','=',$request->name)
      ->get();
      
      $wizards = json_encode($estado_ficha);
      return response()->json($wizards); 
    }

    public function edit_cliente(Request $request){
      $client = DB::table('clientes')
        ->join('personas', 'personas.idpersona' ,'clientes.cliente_persona')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
        ->where('personas.nombre_apellido','=', $request->name)
        ->get();

      $wizards = json_encode($client);
  
      return response()->json($wizards);
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