<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
use App\Automovile;
use App\Marca;
use App\Autosnuevo;
use App\Autosusado;
 class AutomovileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$name  = $request->get('name'); 
       
       $autos=Automovile::Search($request->name)      
       ->orderBY('id_auto')
       ->paginate(5);
<<<<<<< HEAD
              
       $files = File::orderBy('created_at','DESC')->paginate(6);   
    
        return view('autos.index')->with('autos',$autos)
                                  ->with('files',$files);

       
=======
                   
              
  //  dd($request->name);
        return view('autos.index')->with('autos',$autos);
       $autos = Automovile::all();
        
        return view('autos.index', compact('autos'));
>>>>>>> 66362415a9fd52d70ebd30f2bea40f1f8dbadb6a
    }
      public function usados(Request $request)
    {
      
       
       $autos=Automovile::Search($request->name)   
          
       ->orderBY('id_auto')
       ->paginate(5);
       
       $marcas=Marca::All();
         
        return view('autos/usados')->with('autos',$autos)
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
     * Store a newly created resource in storage.
     *
@@ -72,77 +37,9 @@ public function createusados()
     */
    public function store(Request $request)
    { 
        if($request->input("nuevo")=="nuevo"){
        $share = new Automovile([
            'modelo' => $request->input('modelo'),
            'descripcion'=> $request->input('version'),
            'color'=> $request->input('color'),
            'estado'=> $request->input('estado'),
            'vin' => $request->input('vin'),
        ]);
        $share->save();
           //return redirect('/clientes');
        return redirect('autos')->with('success', 'Stock has been added');
         }
        elseif($request->input("usado")=="usado"){
            $idmarca=$request->get('marca');
       //dd($request->get('marca'));   
          $marca = Marca::where("idmarca","=",$idmarca)->select("idmarca")->get();
        
          foreach ($marca as $item) {
            //echo "$item->idpersona";
          }  
          //dd($marca);        
          $idmarcas=$item->idmarca;
              $share = new Automovile([
            'idmarca' => $idmarcas, 
            'modelo' => $request->input('modelo'),
            'descripcion'=> $request->input('version'),
            'color'=> $request->input('color'),
              'precio'=>$request->input('precio'),         
            'estado'=> $request->input('estado'),
            'dominio' => $request->input('dominio'),
            'visible'=> 1
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
            'titular'=> $request->input('titular'),
            'anio' => $request->input('anio'),
            'kilometros' => $request->input('kilometros'),
            'chasis_num'=> $request->input('chasis_num'),
            'motor_num'=> $request->input('motor_num'),
          ]);
          $nuevo->save();        
         
         //return redirect('/clientes');
          return redirect('autos/usados')->with('success', 'Stock has been added');
        }
         
         //
    }
  
     /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = File::find($id)
        ->orderBy('created_at','DESC')
        ->paginate(6);   
    dd($files);
        return view('usados')->with('autos',$autos)
                                  ->with('files',$files);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
=======
@@ -162,79 +59,21 @@ public function show($id)
>>>>>>> 66362415a9fd52d70ebd30f2bea40f1f8dbadb6a
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
      $value = Marca::where("nombre","=",$marca)->select("idmarca")->get();
      foreach($value as $idmarka){}
      
     //dd($idmarka);
      DB::table('autosusados')
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.id_auto')
            ->where('automoviles.id_auto',"=",$id)
            ->update([
                "idmarca" => $idmarka->idmarca,
                "modelo" => $request->get('modelo'),
                "descripcion" => $request->get('version'),
                "color" => $request->get('color'),
                "estado" => $request->get('estado'),
                "dominio" => $request->get('dominio'),
                "titular" => $request->get('titular'),
                "anio" => $request->get('anio'),
                "kilometros" => $request->get('kilometros'),
                "precio" => $request->get('precio'),
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
        ->join('automoviles', 'automoviles.id_auto' ,'autosusados.id_auto') 
        ->join('marcas','marcas.idmarca','automoviles.idmarca')       
        ->where('automoviles.id_auto','=', $idcar)
        ->get();
//dd($autos);
      return view('autos/editusado', compact('autos'));
        //
    }
     
  }
