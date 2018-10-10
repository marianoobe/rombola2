<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TipoFinanciera;
use App\Financiera;
use App\CantidadCuotas;

class FinancieraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financiera = DB::table('tipo_financieras')
        ->join('financieras','financieras.idtipofinanciera','tipo_financieras.idtipo')
        ->join('cantidad_cuotas', 'cantidad_cuotas.idcant_financ', 'financieras.idfinanciera')
        ->paginate(3);

       return view('financiera.index',compact('financiera'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_finan = TipoFinanciera::pluck('nombretipo');

        return view('financiera.create',compact('tipo_finan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $tipo = $request->input('tipofinanciera')+1;
        $tipo_finan = TipoFinanciera::where("idtipo","=",$tipo)->select('idtipo')->first();

        $financiera= new Financiera([
            'idtipofinanciera' => $tipo,
            'nomb_financ' => $request->input('nombrefinanc')
        ]);
        $financiera->save();

        $nombrefinanc = $request->input('nombrefinanc');
        $finan = Financiera::where("nomb_financ","=",$nombrefinanc)->select('idfinanciera')->get();
        foreach ($finan as $item) {}
        
        $id = $item->idfinanciera;
        
        $cuotas = $request->input('cantcuotas');

        for ($i=0; $i < count($cuotas); $i++) { 
        $cantidad = new CantidadCuotas ([
            'idcant_financ' => $id,
            'numcuotas' => $cuotas[$i]
        ]);
        $cantidad->save();
        }
        return redirect('/admin/financiera')->with('success', 'Financiera Guardada');
        
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