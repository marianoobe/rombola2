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
       
       $autos=Automovile::Search($request->name)
       ->whereNotNull('vin')
       ->orderBY('id_auto')
       ->paginate(3);
                   
              
  //  dd($request->name);
        return view('autos.index')->with('autos',$autos);

       
    }
      public function usados(Request $request)
    {
        //$name  = $request->get('name');
       
       $autos=Automovile::Search($request->name,$request->dato)
       ->whereNotNull('dominio')
       ->orderBY('id_auto')
       ->paginate(3);
        
   
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
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'version'=> $request->input('version'),
            'color'=> $request->input('color'),
            'combustible'=> $request->input('combustible'),            
            'estado'=> $request->input('estado'),
            'vin' => $request->input('vin'),
          ]);
          $share->save();

          //return redirect('/clientes');
          return redirect('autos')->with('success', 'Stock has been added');

        }
        elseif($request->input("usado")=="usado"){
             $share = new Automovile([
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'version'=> $request->input('version'),
            'color'=> $request->input('color'),
            'combustible'=> $request->input('combustible'),           
            'estado'=> $request->input('estado'),
            'dominio' => $request->input('dominio'),
          ]);
          
          $share->save();

          $dominio=$request->get('dominio');
          
          $car = Automovile::where("dominio","=",$dominio)->select("id_auto")->get();
          
                
        foreach ($car as $item) {
            //echo "$item->idpersona";
          }
          
          $idauto=$item->id_auto;
          $nuevo = new Autosusado([
            'id_auto' => $idauto,            
            'titular' => $request->input('titular'),
            'anio' => $request->input('anio'),
            'kilometros' => $request->input('kilometros'),
            'chasis_num'=> $request->input('chasis_num'),
            'motor_num'=> $request->input('motor_num'),
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
        //echo "$item->idpersona";
         }
     // dd($auto);
      $idcar=$item->id_auto;
          $autos = DB::table('automoviles')
               
        ->where('automoviles.id_auto','=', $idcar)
        ->get();
      

      return view('autos.edit', compact('autos'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
                
       if($request->input("nuevo")=="nuevo"){

                 
                 $auto = Automovile::find($id);
                 $auto->marca =strtoupper ($request->input("marca"));
                 $auto->modelo =strtoupper($request->input("modelo"));
                 $auto->version = strtoupper($request->input("version"));
                 $auto->color =strtoupper ($request->input("color"));
                 $auto->vin = strtoupper($request->input("vin"));              
                 $auto->estado =strtoupper ($request->input("estado"));
        $auto->save();
             
        
       
       return redirect('/autos')->with('success', 'Stock has been updated');   
       }
        elseif($request->input("usado")=="usado"){

 //dd($request->input('id_auto'));
                 $auto = Automovile::find($id);
                 $auto->marca =strtoupper ($request->input("marca"));
                 $auto->modelo =strtoupper($request->input("modelo"));
                 $auto->version = strtoupper($request->input("version"));
                 $auto->color =strtoupper ($request->input("color"));
                          
                 $auto->estado =strtoupper ($request->input("estado"));
                $auto->dominio= strtoupper ($request->input('dominio'));
               //  dd($auto);
              $auto->save();

              /*  $autos=Autousado::find(Input::get("id_auto"));
                $autos->titular=strtoupper ($request->input('titular'));
                $autos->anio= strtoupper ($request->input('anio'));
                $autos->kilometros= strtoupper ($request->input('kilometros'));
                $autos->estado= strtoupper ($request->input('estado'));
                dd($autos);
              $autos->save();*/
       
      
       return redirect('autos/usados')->with('success', 'Stock has been updated');  




        }
        
    }
   public function editusado($id)
    {
        $auto = Automovile::where("id_auto","=",$id)->select("id_auto")->get();
         foreach ($auto as $item) {
        //echo "$item->idpersona";
      }
     // dd($auto);
      $idcar=$item->id_auto;

      $autos = DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.id_auto')        
        ->where('automoviles.id_auto','=', $idcar)
        ->get();
//dd($autos);
      return view('autos/editusado', compact('autos'));
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