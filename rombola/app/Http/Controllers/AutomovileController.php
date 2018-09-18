<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Automovile;

use App\Autosnuevo;
use App\Autosusado;

class AutomovileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$name  = $request->get('name');
       
       $autos=Automovile::Search($request->name)->orderBY('id_auto')->paginate(3);
                   
              
  //  dd($request->name);
        return view('autos.index')->with('autos',$autos);

       
    }
public function usados(Request $request)
    {
        //$name  = $request->get('name');
       
       $autos=Automovile::Search($request->name)->orderBY('id_auto')->paginate(3);
        
  //  dd($request->name);
        return view('autos.usados')->with('autos',$autos);

       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autos.create');
    }
     public function createusados()
    {
        return view('autos/createusados');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
          $share = new Automovile([
            'marca' => $request->get('marca'),
            'modelo' => $request->get('modelo'),
            'version'=> $request->get('version'),
            'color'=> $request->get('color'),
            'combustible'=> $request->get('combustible'),
            'chasis_num'=> $request->get('chasis_num'),
            'motor_num'=> $request->get('motor_num'),
            'estado'=> $request->get('estado'),
          ]);
          $share->save();

           $chasis=$request->get('chasis_num');
          
          $car = Automovile::where("chasis_num","=",$chasis)->select("id_auto")->get();
          
                  
        foreach ($car as $item) {
            //echo "$item->idpersona";
          }
          $idauto=$item->id_auto;
          $nuevo = new Autosnuevo([
            'id_auto' => $idauto,
            'vin' => $request->get('vin'),
           
          ]);
          $nuevo->save();        

        
         //return redirect('/clientes');
          return redirect('autos')->with('success', 'Stock has been added');

    }
     public function store2(Request $request)
    {
          
          $share = new Automovile([
            'marca' => $request->get('marca'),
            'modelo' => $request->get('modelo'),
            'version'=> $request->get('version'),
            'color'=> $request->get('color'),
            'combustible'=> $request->get('combustible'),
            'chasis_num'=> $request->get('chasis_num'),
            'motor_num'=> $request->get('motor_num'),
            'estado'=> $request->get('estado'),
          ]);
          $share->save();

           $chasis=$request->get('chasis_num');
          
          $car = Automovile::where("chasis_num","=",$chasis)->select("id_auto")->get();
          
                  
        foreach ($car as $item) {
            //echo "$item->idpersona";
          }
          $idauto=$item->id_auto;
          $nuevo = new AutoNuevo([
            'id_auto' => $idauto,
            'dominio' => $request->get('dominio'),
            'titular' => $request->get('titular'),
            'anio' => $request->get('anio'),
            'kilometros' => $request->get('kilometros'),
           
          ]);
          $nuevo->save();        

        
         //return redirect('/clientes');
          return redirect('autos')->with('success', 'Stock has been added');

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
        return view('autos.edit');
    }
    public function editusado($id)
    {
        return view('autos.editusado');
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