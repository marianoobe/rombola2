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
        
   
        return view('autos/usados')->with('autos',$autos);

       
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
        if($request->input("nuevo")=="nuevo"){

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
        elseif($request->input("usado")=="usado"){
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
          $nuevo = new Autosusado([
            'id_auto' => $idauto,
            'dominio' => $request->get('dominio'),
            'titular' => $request->get('titular'),
            'anio' => $request->get('anio'),
            'kilometros' => $request->get('kilometros'),
           
          ]);
          $nuevo->save();        

        
         //return redirect('/clientes');
          return redirect('autos/usados')->with('success', 'Stock has been added');
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
          $auto = Automovile::where("id_auto","=",$id)->select("id_auto")->get();
         foreach ($auto as $item) {
        echo "$item->id_auto";
      }
      $idcar=$item->id_auto;

      $car = DB::table('autosnuevos')
        ->join('automoviles', 'automoviles.id_auto' ,'autosnuevos.id_auto')        
        ->where('automoviles.id_auto','=', $idcar)
        ->get();

      return view('autos.edit', compact('car'));
    }
    public function editusado($id)
    {
        $auto = Automovile::where("id_auto","=",$id)->select("id_auto")->get();
         foreach ($auto as $item) {
        //echo "$item->idpersona";
      }
      $idcar=$item->id_auto;

      $car = DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.id_auto')        
        ->where('automoviles.id_auto','=', $idcar)
        ->get();

      return view('autos/editusado', compact('car'));
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
         //if($request->input("nuevo")=="nuevo"){

             DB::table('autosnuevos')
        ->join('automoviles', 'automoviles.id_auto' ,'autosnuevos.id_auto')
             ->where('id_auto',"=",$id)
            ->update([
                "marca" => $request->get('marca'),
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),
                "vin" => $request->get('vin'),
                "chasis_num" => $request->get('chasis_num'),
                "motor_num" => $request->get('motor_num'),
                "estado" => $request->get('estado'),

        ]);
      //$p->save();
       return redirect('autos')->with('success', 'Stock has been updated');   
         /*
         elseif ($request->input("usado")=="usado") {
             DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.id_auto')
             ->where('id_auto',"=",$id)
            ->update([
                "marca" => $request->get('marca'),
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),
                "vin" => $request->get('vin'),
                "chasis_num" => $request->get('chasis_num'),
                "motor_num" => $request->get('motor_num'),
                "estado" => $request->get('estado'),
                 'dominio' => $request->get('dominio'),
                'titular' => $request->get('titular'),
                'anio' => $request->get('anio'),
                'kilometros' => $request->get('kilometros'),

        ]);
         }*/

        
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