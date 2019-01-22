<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Persona;
use App\Operaciones;
use App\Estado;
use DB;
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

        $venta_operac = DB::table('operaciones')
      ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
      ->join('personas','operaciones.persona_operacion','personas.idpersona')
      ->join('clientes','personas.idpersona','clientes.cliente_persona')
      ->join('estados','operaciones.estado','estados.id_estado')
      ->join('users','ventas.id_user','users.id')
      ->join('automoviles','ventas.idventa_auto0km','automoviles.id_auto')
      ->join('marcas','marcas.id_marca','automoviles.marca_id')
      ->paginate(10);

        $estado=Estado::All();

        return view('adminlte::home',compact('client_pers','estado','venta_operac'));
    }


}