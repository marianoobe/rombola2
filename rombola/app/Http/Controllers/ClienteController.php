<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ClienteController extends Controller
{
    function inicio(){
        return view('welcome');
    }

    function cliente(Request $request){
        /*$client=DB::table('clientes')
        ->join('personas','personas.idpersona','clientes.idpersona')->get();
        */

        $client=DB::table('clientes')
        ->join('personas','personas.idpersona','clientes.idpersona')->paginate(3);
        return view('clientes',compact('client'));
    }

    //function cliente_store(ClienteFormRequest $request){}
}
