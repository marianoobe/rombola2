@extends('adminlte::layouts.app')

<@section('seccion')

@can('prueba')
    <button>Crear</button>
@endcan

@can('jgjgj')
    <button>Venta</button>
@endcan

<p>Contenido</p>

@endsection