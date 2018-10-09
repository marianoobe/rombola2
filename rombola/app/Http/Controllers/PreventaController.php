<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Cliente;
use App\Operaciones;
use App\Preventa;
use App\Telefono;
use App\TipoFinanciera;
use App\Financiera;
use App\CantidadCuotas;
use DB;

class PreventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preventa_cliente = DB::table('preventas')
        ->join('operaciones','operaciones.id_operacion','preventas.preventa_oper')
        ->join('personas','personas.idpersona','operaciones.persona_operacion')
        ->paginate(3);

        return view('pre-venta',compact('preventa_cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_finan = TipoFinanciera::pluck('nombretipo');

        return view('preventa.create',compact('tipo_finan'));
    }

    public function getFinanciera(Request $request, $id){
        if($request->ajax()){
            $financ= Financiera::financieras($id);
            return response()->json($financ);
        }
    }

    public function getCuotas(Request $request, $id){
        if($request->ajax()){
            $cuotas= CantidadCuotas::cantidad_cuotas($id);
            return response()->json($cuotas);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //insert Persona-Cliente
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
            'fecha_nacimiento' => "####",
            'domicilio'=> "####",
            'estado_civil'=> "####",
            'estado_ficha'=> "Incompleta"
          ]);
          $cliente->save();
          //--/insert Persona-Cliente
          if($request->get('cel_1') != null)
          {
          $tel = new Telefono([
            'idpersona' => $idpers,
            'num_tel' => $request->get('cel_1'),
            'tipo' => '2'
          ]);
          $tel->save();
          }
          //insert Operacion-Preventa
        $fecha_oper=$request->get('fecha_oper');
        $operacion = new Operaciones([
          'persona_operacion' => $idpers,
          'estado' => "",
          'fecha_oper'=> $fecha_oper,
          'aviso'=> ""
        ]);
        $operacion->save();

        $operacion = Operaciones::where("fecha_oper","=",$fecha_oper)->select("id_operacion")->get();
      
        foreach ($operacion as $oper) {
          //echo "$item->idpersona";
        } 
        $operacion=$oper->id_operacion;
        
        $idtipo = $request->get('tipofinanciera');

        $idp = TipoFinanciera::where("idtipo","=",$idtipo+1)->select("nombretipo")->get();
        
        foreach ($idp as $item) {}


        if ($item->nombretipo == "Sin") {
            $nomtipo ="#";
            $nomfinanc = "#";
            $cant = 0;
            $importe = 0;
        }
        else{
            $idnom = $request->get('nombfinanciera');
            $idcuota = $request->get('numcuotas');
    
            $idf = Financiera::where("idfinanciera","=",$idnom)->select("nomb_financ")->get();
            $idc = CantidadCuotas::where("idcant","=",$idcuota)->select("numcuotas")->get();
    
            foreach ($idf as $item1) {}
    
            foreach ($idc as $item2) {}

            $nomtipo = $item->nombretipo;
            $nomfinanc = $item1->nomb_financ;
            $cant = $item2->numcuotas;
            $importe = $request->get('impor_finan');
        }

        $preventa = new Preventa([
          'preventa_oper' => $operacion,
          'auto_interesado' => $request->get('auto_interesado'),
          'detalles' => $request->get('detalles'),
          'usado' => $request->get('usado'),
          'contado' => $request->get('contado'),
          'otropago' => "",//$request->get('otropago'),
          'nombretipo'=> $nomtipo,
          'nomb_financ' => $nomfinanc,
          'numcuotas' => $cant,
          'cant_pormes' => $request->get('cant_pormes'),
          'importe_finan' => $importe
        ]); 
        $preventa->save();
        //---insert Operacion-Preventa

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
    public function edit($dni)
    {
      $dnipers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.id_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.idpreventa','operaciones.id_operacion')
        ->where('personas.idpersona','=', $idpers)
        ->get();
        

        return view('preventa.edit', compact('preventa'));
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
