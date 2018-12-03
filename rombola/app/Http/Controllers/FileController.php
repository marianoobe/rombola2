<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Automovile;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $rutafotos= public_path().'/images/fotos/';
        $files = File::orderBy('created_at','DESC')->paginate(30);
        return view('file.index')->with('files',$files)
                                ->with('rutafotos',$rutafotos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $idauto=$id;        
    
        return view('file.dropzone')->with('idauto',$idauto);
    }

    public function dropzone(Request $request){
       
         $idauto=$request->input('idauto');
        $file = $request->file('file');
        $name=$file->getClientOriginalName();
       // $r1=Storage::disk('fotos')->put($ruta,\File::get($file));//mueve a la carpeta las imagenes
       $file->move(public_path('images/fotos'),$name);

		    $rutadelaimagen='images/fotos/'.$name;// ruta bd de la imagen
        File::create([
            'title' => $file->getClientOriginalName(),
            'description' => 'Upload with dropzone.js',
            'path' => $rutadelaimagen,
            'id_auto'=>$idauto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('file');
        foreach ($files as $file) {
            File::create([
                'title' => $file->getClientOriginalName(),
                'description' => '',
                'path' => $file->store('public/storage')
            ]);
        }
        return redirect('/file')->with('success','File telah diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $files = File::where("id_auto","=",$id)
        ->orderBy('created_at','DESC')
        ->paginate(6);   
    
        return view('usados')->with('files',$files);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $del = File::find($id);
        Storage::delete($del->path);
        $del->delete();
        return redirect('/file');
    }
}
