<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoFinanciera;
use App\Persona;
use App\Automovile;
use App\Marca;

class VentaController extends Controller
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
       ->orderBY('id_auto')
       ->paginate(5);
       $marcas=Marca::All();

        return view('venta.create',compact('tipo_finan','nombapell','autos','marcas'));
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

     //--/insert Persona-Conyuge

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
        //insert Persona-Garante
        $garante = new Conyuge([
          'idpersona' => $idpers,
          'fecha_nacimiento' => $request->get('conyuge_fecha_nac'),
          'domicilio'=> $request->get('conyuge_domicilio'),
          'estado_civil'=> $request->get('conyuge_estado_civil'),
          'relacion_dependencia'=> $request->get('conyuge_relacion_dependencia'),
        'antiguedad'=> $request->get('conyuge_antiguedad'),
        'ingresos_mesuales'=> $request->get('conyuge_ingresos_mesuales'),
        'nombre_padre'=> $request->get('conyuge_nombre_padre'),
        'nombre_madre'=> $request->get('conyuge_nombre_madre'),
        'visible'=> true,
        ]);
        $garante->save();

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

      //--/insert Persona-Garante

      $nombre_conyuge = $request->get('garante_nombre');
      $apellido_conyuge = $request->get('garante_apellido');

      $can = $request->get('check_garante');
      if ($can == 'si') {

        $share = new Persona([
            'dni' => $request->get('garante_dni'),
            'nombre' => $request->get('garante_nombre'),
            'apellido'=> $request->get('garante_apellido'),
            'nombre_apellido'=> $nombre_conyuge." ".$apellido_conyuge,
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
