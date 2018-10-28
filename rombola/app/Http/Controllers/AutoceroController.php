<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Automovile;

use App\Autosnuevo;
use App\Autosusado;
use App\Autocero;
use App\Marca;
use App\Estadocero;

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
        $autos = DB::table('automoviles')
        ->join('marcas','marcas.id_marca','automoviles.marca_id') 
       ->join('autoceros', 'autoceros.auto_id' ,'automoviles.id_auto')       
      ->get();
      
       
        
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
          $marca=$request->get('marca');
         //dd($request->get('marca'));
          $value = Marca::where("id_marca","=",$marca)->select("id_marca")->get();
         // dd($value);
          foreach($value as $idmarka){}

            $idm= $idmarka->id_marca;
         $estado=$request->get('estado');
          $valor = Estadocero::where("nombreEstado","=",$estado)->select("id_estadoCero")->get();
         
          foreach($valor as $item){}
            $ides=$item->id_estadoCero;

            $id=DB::table('automoviles')               
            ->insertGetId([
                "marca_id" =>$idm,
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),                         
                "precio" => $request->get('precio'),              
                "ficha"=>"completa",
                "visible"=>1
         ]);
           
          DB::table('autoceros')
          ->insert([
                "auto_id"=>$id,               
               "estadoCero_id" => $ides,
                "vin" => $request->get('vin'),
               

         ]);

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

      $auto = Automovile::where("id_auto","=",$id)->select("id_auto")->get();
         foreach ($auto as $item) {
        //echo "$item->idpersona";
      }
     
      $idcar=$item->id_auto;
       $autos = DB::table('autoceros')
        ->join('automoviles', 'automoviles.id_auto' ,'autoceros.auto_id') 
         ->join('estadoceros', 'estadoceros.id_estadoCero' ,'autoceros.estadoCero_id') 
        ->join('marcas','marcas.id_marca','automoviles.marca_id')       
        ->where('automoviles.id_auto','=', $idcar)
        ->get();
//dd($autos);
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
      $value = Marca::where("nombre","=",$marca)->select("id_marca")->get();
      foreach($value as $idmarka){}
      
$idm= $idmarka->id_marca;

        $estado=$request->get('estado');
          $valor = EstadoCero::where("nombreEstado","=",$estado)->select("id_estadoCero")->get();
          foreach($valor as $item){}
            $ides=$item->id_estadoCero;
    
      DB::table('autoceros')
        ->join('automoviles', 'automoviles.id_auto' ,'autoceros.auto_id')
            ->where('automoviles.id_auto',"=",$id)
            ->update([
                "marca_id" => $idm,
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),                
                "vin" => $request->get('vin'),
                           
                "precio" => $request->get('precio'),               
                "estadoCero_id" => $ides,
         ]);
             
        
       
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