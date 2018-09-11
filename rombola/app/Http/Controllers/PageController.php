<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function inicio(){
        return view('welcome');
    }

    function cliente(){
        return view('clientes');
    }

    function preventa(){
        return view('pre-venta');
    }
}
