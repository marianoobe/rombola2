<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use App\Marca;
use App\Listaprecio;
use Storage;
use Illuminate\Support\Facades\Validator;
class ListaprecioController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lista = DB::table('listaprecios')
        ->join('marcas','marcas.idmarca','listaprecios.idmarca')             
        ->paginate(5);
         $rutalista= "storage/listas/";
         $rutaimgmarcas= "../storage/imgmarcas/";
        $marcas= DB::table('marcas')
        ->orderby('nombre','asc')
        ->get();


         
        return view('listaprecios.index')
        ->with('lista',$lista)
        ->with('marcas',$marcas)
        ->with("rutalista",$rutalista)
        ->with("rutaimgmarcas",$rutaimgmarcas);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=DB::table('marcas')->get();
        
        return view('listaprecios.create')->with('marcas',$marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $archivo = $request->file('file');
    	$input  = array('file' => $archivo) ;
       $reglas = array('file' => 'required|mimes:pdf|max:50000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo");
        }
        else
        {
             $idmarca=$request->get('marcas');
          //dd($request->input('fecha'));
          $marca = Marca::where("idmarca","=",$idmarca)->select("idmarca")->get();
        
          foreach ($marca as $item) {
            //echo "$item->idpersona";
          }
          //dd($marca);
          $idmarcas=$item->idmarca;
        $carpeta=$request->input("marcas");
	      $ruta=$archivo->getClientOriginalName();
		    $r1=Storage::disk('listas')->put($ruta,\File::get($archivo));
 $lista = new Listaprecio([
            'idmarca' => $idmarcas,         
          
            'rutalista' => $ruta,
           
            'fechalista' => $request->input('fecha'),
          ]);
          $lista->save();
      
	       
         }
            return redirect('/listaprecios')->with('success', 'Lista Guardada');
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