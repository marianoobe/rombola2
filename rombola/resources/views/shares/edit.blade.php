@extends('adminlte::layouts.app')

@section('seccion2')
     <div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
     @foreach($client as $item)
		 @endforeach()
     <form method="POST" action="{{ route('clientes.update', $item->idpersona) }}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="dni">Dni:</label>
          <input type="text" class="form-control" name="dni" value={{ $item->dni }} />
        </div>
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="nombre" value={{ $item->nombre }} />
        </div>
        <div class="form-group">
          <label for="price">Apellido:</label>
          <input type="text" class="form-control" name="apellido" value={{ $item->apellido }} />
        </div>
        <div class="form-group">
          <label for="quantity">Email:</label>
          <input type="text" class="form-control" name="email" value={{ $item->email }} />
        </div>
        <div class="form-group">
          <label for="quantity">Domicilio:</label>
          <input type="text" class="form-control" name="domicilio" value={{ $item->domicilio }} />
        </div>
        <div class="form-group">
          <label for="quantity">Actividad/Empresa:</label>
          <input type="text" class="form-control" name="act_empresa" value={{ $item->act_empresa }} />
        </div>
        <div class="form-group">
          <label for="quantity">Teléfono Fijo:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} />
        </div>
        <div class="form-group">
          <label for="quantity">Celular 1:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} />
        </div>
        <div class="form-group">
          <label for="quantity">Celular 2:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} />
        </div>
        <div class="form-group">
          <label for="quantity">Fecha de Nacimiento:</label>
          <input type="text" class="form-control" name="fecha_nacimiento" value={{ $item->fecha_nacimiento }} />
        </div>
        <div class="form-group">
          <label for="quantity">Estado Civil:</label>
          <input type="text" class="form-control" name="estado_civil" value={{ $item->estado_civil }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      </div>
      </div>
      </div>
      @show