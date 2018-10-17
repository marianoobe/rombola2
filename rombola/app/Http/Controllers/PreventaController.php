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
    public function index(Request $request)
    {
        $preventa_cliente = Preventa::Search($request->name)
        ->join('operaciones','operaciones.id_operacion','preventas.preventa_oper')
        ->join('personas','personas.idpersona','operaciones.persona_operacion')
        ->where('visible','=', 1)
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
        $dni = Persona::pluck('dni');
        $nombre = Persona::pluck('nombre');
        $apellido = Persona::pluck('apellido');
        return view('preventa.create',compact('tipo_finan','dni','nombre','apellido'));
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
        
        $can = $request->get('cancer');
          if ($can == 'nuevo') {
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
            'cliente_persona' => $idpers,
            'fecha_nacimiento' => "####",
            'domicilio'=> "####",
            'estado_civil'=> "####",
            'estado_ficha'=> "Incompleta",
            'visible'=> true,
          ]);
          $cliente->save();
          //--/insert Persona-Cliente
          if($request->get('cel_1') != null)
          {
          $tel = new Telefono([
            'personas_telefono' => $idpers,
            'num_tel' => $request->get('cel_1'),
            'tipo' => '2'
          ]);
          $tel->save();
          }

          $fecha_oper=$request->get('fecha_oper');
          $operacion = new Operaciones([
            'persona_operacion' => $idpers,
            'estado' => "En Negociación",
            'fecha_oper'=> $fecha_oper,
            'aviso'=> false,
            'visible' => true,
          ]);
          $operacion->save();
        }
        else{
            $dni = $request->get('tipodni');
            
            $idpersona = Persona::where("dni","=",$dni)->select("idpersona")->get();
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
          /*insert Operacion-Preventa
        $fecha_oper=$request->get('fecha_oper');
        $operacion = new Operaciones([
          'persona_operacion' => $idpers,
          'estado' => "En Negociación",
          'fecha_oper'=> $fecha_oper,
          'aviso'=> false,
          'visible' => true,
        ]);
        $operacion->save();
*/
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

        $p = DB::table('preventas')
        ->select('codigo','cod_part1','cod_part2')
        ->orderBy('created_at','DESC')
        ->take(1)
        ->get();
        $cant=count($p);

        if ($cant==0) {
        
            $part1 = '000';
            $part2 = '001';
            $codigo = "PV-".$part1."-".$part2 ;
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

            $codigo = "PV-"."000"."-".$part2 ;
        }
        //dd($codigo);
        $preventa = new Preventa([
          'preventa_oper' => $operacion,
          'auto_interesado' => $request->get('auto_interesado'),
          'detalles' => $request->get('detalles'),
          'usado' => $request->get('usado'),
          'contado' => $request->get('contado'),
          'otropago' => $request->get('otropago'),
          'nombretipo'=> $nomtipo,
          'nomb_financ' => $nomfinanc,
          'numcuotas' => $cant,
          'cant_pormes' => $request->get('cant_pormes'),
          'importe_finan' => $importe,
          'cod_part1' => $part1,
          'cod_part2' => $part2,
          'codigo' => $codigo,
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
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.preventa_oper','operaciones.id_operacion')
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
       
      $dnipers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->where('personas.idpersona','=', $idpers)
        ->update([
            "visible"=>"0"
        ]);

        return redirect('/pre-venta')->with('success', 'Preventa Eliminada');
    }
}
