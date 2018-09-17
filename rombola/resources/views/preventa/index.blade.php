@extends('adminlte::layouts.app')

@section('seccion_index_preventa')

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Clientes</h3>
					<div class="col-sm-offset-10">
						<button type="button" class="btn btn-success btn-block" id="btn-nuevaFicha" data-toggle="modal" data-target="#modal-clienteNuevo"
						 style="margin-bottom:10%;">NUEVO CLIENTE</button>
					</div>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<!--<div class="row">
							<div class="col-sm-6">
								<div class="dt-buttons btn-group">
									<a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#" title="Excel"><span><i
											    class="fa fa-file-excel-o"></i></span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0"
									    aria-controls="example" href="#" title="PDF"><span><i class="fa fa-file-pdf-o"></i></span></a>
									<a class="btn btn-default buttons-collection buttons-colvis" tabindex="0" aria-controls="example" href="#"
									    title="Ocultar Columnas"><span><i class="fa fa-check-square-o"></i></span></a><a class="btn btn-default buttons-print"
									    tabindex="0" aria-controls="example" href="#" title="Imprimir"><span><i class="fa fa-print"></i></span></a>
								</div>
							</div>
							<div class="col-sm-5">
								<div id="example_filter" class="dataTables_filter">
									<label>Buscar:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label>
								</div>
							</div>
						</div>-->
						<thead>
							<tr>
								<th scope="col">DNI</th>
								<th scope="col">Nombre y Apellido</th>
								<th scope="col">Email</th>
								<th scope="col">Domicilio</th>
								<th scope="col">Teléfono</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($client_pers as $item)
							<tr>
								<td>{{$item->dni}}</td>
								<td>{{$item->nombre}} {{$item->apellido}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->domicilio}}</td>
								<td>{{$item->num_tel}}</td>
								<td style="cursor: default;">
									<a href="{{ route('clientes.edit',$item->dni)}}" class="btn btn-info btn-sm">
                                     <span class="glyphicon glyphicon-search"></span></a>
									
								</td>
							</tr>
							@endforeach()
						</tbody>
					</table>
					{{$client_pers->render()}}

@endsection