<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoFinanciera;
use App\Financiera;

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
        $tipo_finan = TipoFinanciera::pluck('nombretipo','idtipo');

        return view('preventa.create',compact('tipo_finan'));
    }

    public function getFinanciera(Request $request, $id){
        
        if($request->ajax()){
            $financ= Financiera::financiera($id);
            return response()->json($financ);
          //  return response()->json($financ);
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

          //insert Operacion-Preventa
        $operacion = new Operacion([
          'idpersona' => $idpers,
          'estado' => $request->get('estado'),
          'fecha_oper'=> $request->get('fecha_oper'),
          'aviso'=> $request->get('aviso')
        ]);
        $operacion->save();

        $fecha_oper=$request->get('fecha_oper');
        
        $operacion = Operacion::where("fecha_oper","=",$fecha_oper)->select("idoperacion")->get();
      
        foreach ($operacion as $item) {
          //echo "$item->idpersona";
        }
        $idoperacion=$item->idoperacion;
        $preventa = new Preventa([
          'id_operacion' => $idoperacion,
          'auto_interesado' => $request->get('auto_interesado'),
          'detalles' => $request->get('detalles'),
          'usado' => $request->get('usado'),
          'contado' => $request->get('contado'),
          'cheques' => $request->get('cheques'),
          'tipo_financiación'=> $request->get('tipo_financiación'),
          'financieras' => $request->get('financieras'),
          'cant_cuotas' => $request->get('cant_cuotas'),
          'importe_finan' => $request->get('importe_finan'),
          'cant_pormes' => $request->get('cant_pormes')
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
