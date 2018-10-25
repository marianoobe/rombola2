<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Automovile;

use App\Autosnuevo;
use App\Autosusado;
use App\Autocero;
use App\Marca;
class AutoceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$name  = $request->get('name'); 
       
       $autos=Autocero::Search($request->name)   
          
       ->orderBY('id_autocero')
       ->paginate(5);
        
       $marcas=Marca::All();
         
        return view('cero.index')->with('autos',$autos)
                                    ->with('marcas',$marcas);
    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=DB::table('marcas')->get();
      
        return view('cero/create')->with('marcas',$marcas);
    }
     
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idmarca=$request->get('marca');
         
        $marca = Marca::where("idmarca","=",$idmarca)->select("idmarca")->get();
        
        foreach ($marca as $item) {}  
         // dd($marca);        
          $idmarcas=$item->idmarca;

          $share = new Autocero([
           'idmarca' => $idmarcas, 
            'modelo' => $request->input('modelo'),
            'descripcion'=> $request->input('version'),
            'color'=> $request->input('color'),        
            'vin' => $request->input('vin'),
            'visible'=> 1
          ]);
         // dd($save);
          $share->save();

          //return redirect('/clientes');
          return redirect('/cero')->with('success', 'Stock has been added');

        
        
         

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
          $autos = DB::table('autoceros')
        ->join('marcas','marcas.idmarca','autoceros.idmarca')       
        ->where('autoceros.id_autocero','=', $id)
        ->get();
     //d($autos);
     

      return view('cero.edit', compact('autos',$autos));
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
        $marca=$request->get('marca');
        $value = Marca::where("nombre","=",$marca)->select("idmarca")->get();
         foreach($value as $idmarka){}
                 
                 $auto = Autocero::find($id);
                 $auto->idmarca = $idmarka->idmarca;
                 $auto->modelo =strtoupper($request->input("modelo"));
                 $auto->DESCRIPCION = strtoupper($request->input("version"));
                 $auto->color =strtoupper ($request->input("color"));
                 $auto->vin = strtoupper($request->input("vin"));              
                  
        $auto->save();
             
        
       
       return redirect('/cero')->with('success', 'Stock has been updated');   
       }
        




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