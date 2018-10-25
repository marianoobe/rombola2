<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoFinanciera;
use App\Persona;
use App\Cliente;
use App\Telefono;
use App\Automovile;
use App\Marca;
use App\Operaciones;
use App\Conyuge;
use App\Autocero;
use DB;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $venta_operac = DB::table('operaciones')
      ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
      ->get();
       //dd($venta_operac);
        return view('venta',compact('venta_operac'));
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
        
        $autos=Autocero::select("*")   
       ->orderBY('id_autocero')
       ->paginate(5);

       $auto_usado=Automovile::select("*")      
       ->orderBY('id_auto')
       ->paginate(5);

        $marcas=Marca::All();

        return view('venta.create',compact('tipo_finan','nombapell','autos','marcas','auto_usado'));
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
        
      //insert Persona-Cliente
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
      ]);
      $cliente->save();
      //--/insert Persona-Cliente
      if($request->get('nuevo_cel_1') != null)
      {
      $tel = new Telefono([
        'personas_telefono' => $idpers,
        'num_tel' => $request->get('nuevo_cel_1'),
        'tipo' => '2'
      ]);
      $tel->save();
      }

      $fecha_oper=$request->get('fecha_oper');
      $operacion = new Operaciones([
        'persona_operacion' => $idpers,
        'estado' => "En Negociación",
        'fecha_oper'=> $fecha_oper,
        'aviso'=> 0,
        'visible' => 1,
      ]);
      $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      $operacion->save();
    }
    else{

        $nya = $request->get('nya_cliente');
        
        $idpersona = Persona::where("nombre_apellido","=",$nya)->select("idpersona")->get();
        foreach ($idpersona as $items) {
        }
        $idpersona = $items->idpersona;
        $fecha_oper=$request->get('fecha_oper');
       $operacion = new Operaciones([
      'persona_operacion' => $idpersona,
      'estado' => "En Negociación",
      'fecha_oper'=> $fecha_oper,
      'aviso'=> false,
      'visible' => true,
    ]);
    $operacion->save();

    }
    
    if($request->get('input_conyuge')=="si"){
     //--insert Persona-Conyuge

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

        $dni=$request->get('conyuge_dni');
        
        $pers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      
        foreach ($pers as $item) {
          //echo "$item->idpersona";
        }
        $idpers=$item->idpersona;
        //insert Persona-Conyuge
        $conyuge = new Conyuge([
          'idconyuge_persona' => $idpers,
          'fecha_nacimiento' => $request->get('conyuge_fecha_nac'),
          'domicilio'=> $request->get('conyuge_domicilio'),
          'estado_civil'=> $request->get('conyuge_estado_civil'),
          'visible'=> 1,
        ]);
        $conyuge->save();

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

          if ($request->get('estado_vineta')=="stock") {
            # code...
          } else {
            # code...
          }
          

           /*insert Auto Entregado -------*/

           if($request->get('valor_entregado')=="si"){
            $usado = new Automovile([
              'idmarca' => $idmarcas, 
              'modelo' => $request->input('modelo'),
              'descripcion'=> "",
              'color'=> $request->input('color'),
              'precio'=>"",         
              'estado'=> "A Designar",
              'dominio' => $request->input('dominio'),
              'visible'=> 1
            ]);
            $usado->save();

          $dominio=$request->get('dominio');
          $car = Automovile::where("dominio","=",$dominio)->select("id_auto")->get();
                       
          foreach ($car as $item) {}
            
            $idauto=$item->id_auto;
            $nuevo = new Autosusado([
              'id_auto' => $idauto,            
              'titular'=> $request->input('nomb_titular'),
              'anio' => $request->input('anio'),
              'kilometros' => 0,
              'chasis_num'=> $request->input('chasis_num'),
              'motor_num'=> $request->input('motor_num'),
            ]);
            $nuevo->save(); 

            }
            else{$car="";}


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
                $part2 = "0".($part2+1);
            }
            else {
                $part2 = (string)($part2+1);
            }

            $codigo = "V-"."000"."-".$part2 ;
            }

          
          $dnipers = $request->get('nuevo_dni');
          $venta_operac = Operacion::select('id_operacion')
          ->join('personas','personas.idpersona','operaciones.persona_operacion')
          ->where('personas.dni','=', $dnipers)
          ->orderBy('created_at','DESC')
          ->take(1)
          ->get();

          $total = $request->get('restotal');
          $valor_auto = $request->get('valor_auto_vendido');
          $resto = $total - $valor_auto;


          $venta = new Venta([
          'operacion_venta' => $venta_operac,
          'idventa_autousado' => $car,
          'idventa_auto0km' => "",
          'precio_auto_vendido' => $request->get('valor_auto_vendido'),
          'efectivo' => $request->get('inpefectivo'),
          'cod_part1' => $part1,
          'cod_part2' => $part2,
          'codigo' => $codigo,
          'resto' =>$resto,
          ]);
          $venta->save();
         
          /*insert Cheque -------
          $cheque = $request->get('valor_cheque');
          if ($cheque == 'si') {

          }
          */

          $nomb_marca=$request->get('marca_selec');
          //dd($request->get('marca'));   
             $marca = Marca::where("nombre","=",$nomb_marca)->select("idmarca")->get();
           
             foreach ($marca as $item) {
               //echo "$item->idpersona";
             }  
             //dd($marca);        
             $idmarcas=$item->idmarca;

         

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