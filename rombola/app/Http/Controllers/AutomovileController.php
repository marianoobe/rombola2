<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
 use App\Estadousado;
use App\Automovile;
use App\Marca;
use App\Autosusado;
use App\File;

 class AutomovileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      redirect ('usados');

    }
      public function usados(Request $request)
    {
        
             
      $autos = DB::table('automoviles')
        ->join('marcas','marcas.id_marca','automoviles.marca_id') 
       ->join('autosusados', 'autosusados.auto_id' ,'automoviles.id_auto')
      ->get();
      
        
       $marcas=Marca::All();
    
       
        
        $files = File::orderBy('created_at','DESC')->paginate(6); 
        return view('autos/usados')->with('autos',$autos)                                     
                                   ->with('files',$files)
                                   ->with('marcas',$marcas);
                                    
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
         $marcas=DB::table('marcas')->get();
      
        return view('autos/createusados')->with('marcas',$marcas);
       
        //
    }
    
     /**
 
     */
    public function store(Request $request)
    { 
        
        if($request->input("usado")=="usado"){
               
         $marca=$request->get('marca');
         //dd($request->get('marca'));
          $value = Marca::where("id_marca","=",$marca)->select("id_marca")->get();
         // dd($value);
          foreach($value as $idmarka){}

            $idm= $idmarka->id_marca;
         $estado=$request->get('estado');
          $valor = Estadousado::where("nombreEstado","=",$estado)->select("id_estadoUsado")->get();
          foreach($valor as $item){}
            $ides=$item->id_estadoUsado;

      $id=DB::table('automoviles')               
            ->insertGetId([
                "marca_id" =>$idm,
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),                         
                "precio" => $request->get('precio'),              
                "ficha"=>"incompleta",
                "visible"=>1
         ]);
           
          DB::table('autosusados')
          ->insert([
                "auto_id"=>$id,               
               "estadoUsado_id" => $ides,
                "dominio" => $request->get('dominio'),
                "titular" => $request->get('titular'),
                "anio" => $request->get('anio'),       
                "fechaingreso"=>$request->get('fecha'),

         ]);


         //return redirect('/clientes');
          return redirect('autos/usados')->with('success', 'Stock has been added');
        }
         
         //
    }
  
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $autos = Automovile::where("id_auto","=",$id)->get();
         foreach ($autos as $item) {
        //echo "$item->idpersona";
      }
     
     
//dd($autos);
      return view('autos.edit', compact('autos'));
        //
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
                
     if($request->input("usado")=="usado"){
      // dd($request);
      $marca=$request->get('marca');
      $value = Marca::where("nombre","=",$marca)->select("id_marca")->get();
      foreach($value as $idmarka){}
      
$idm= $idmarka->id_marca;

        $estado=$request->get('estado');
          $valor = Estadousado::where("nombreEstado","=",$estado)->select("id_estadoUsado")->get();
          foreach($valor as $item){}
            $ides=$item->id_estadoUsado;
    
      DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.auto_id')
            ->where('automoviles.id_auto',"=",$id)
            ->update([
                "marca_id" => $idm,
                "modelo" => $request->get('modelo'),
                "version" => $request->get('version'),
                "color" => $request->get('color'),                
                "dominio" => $request->get('dominio'),
                "titular" => $request->get('titular'),
                "anio" => $request->get('anio'),               
                "precio" => $request->get('precio'),
                "fechaingreso"=>$request->get('fecha'),
                "estadoUsado_id" => $ides,
         ]);
                        
      
       return redirect('autos/usados')->with('success', 'Stock has been updated');  
         }
        
    }
   public function editusado($id)
    {
      
        $auto = Automovile::where("id_auto","=",$id)->select("id_auto")->get();
         foreach ($auto as $item) {
        //echo "$item->idpersona";
      }
     
      $idcar=$item->id_auto;
       $autos = DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.auto_id') 
         ->join('estadousados', 'estadousados.id_estadoUsado' ,'autosusados.estadoUsado_id') 
        ->join('marcas','marcas.id_marca','automoviles.marca_id')       
        ->where('automoviles.id_auto','=', $idcar)
        ->get();
//dd($autos);
      return view('autos/editusado', compact('autos'));
        //
    }

        
  }
