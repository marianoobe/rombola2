<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Persona;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $client_pers = Persona::select("*")
        ->join('clientes','clientes.cliente_persona','personas.idpersona')
        ->join('telefonos', 'telefonos.personas_telefono', 'personas.idpersona')
        ->where('telefonos.tipo','=', 2)
        ->where('visible','=', 1)
        ->paginate(6);

        return view('adminlte::home',compact('client_pers'));
    }


}