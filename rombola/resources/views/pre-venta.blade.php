@extends('adminlte::layouts.app')

@section('seccion1')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">PreVentas</h3>
				</div>
				<div class="box-body">


					<div class="col-sm-4 pull-left">
						 <a style="margin-bottom:10%;" role="button" href="{{ route('pre-venta.create') }}" class="btn btn-xl btn-success">NUEVA PREVENTA</a>
					</div>
					<div class="col-sm-4 pull-right">
						<form method="GET" action="{{ route('pre-venta.index') }}" class="navbar-form pull-right" role="search">
							<div class="input-group">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="text" class="form-control" name="name" placeholder="Busqueda">
								<input type="hidden" id="dato" name="dato" value="nuevo">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>
							</div>
						</form>

					</div>
				</div>


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
							<th scope="col">Fecha</th>
							<th scope="col">Auto Buscado</th>
							<th scope="col">Auto Ofrecido</th>
							<th scope="col">Dinero que dispone</th>
							<th scope="col">Formas de Pago</th>
							<th scope="col">Estado</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody id="myTable">
						@foreach($preventa_cliente as $item)
						<tr>
							<td>{{$item->fecha_oper}}</td>
							<td>{{$item->auto_interesado}}</td>
							<td>{{$item->usado}}</td>
							<td>${{$item->contado}}</td>
							<td>{{$item->importe_finan}}</td>
							<td>{{$item->estado}}</td>
							<td style="cursor: default;">
								<a href="{{ route('pre-venta.edit',$item->dni)}}" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-search"></span></a>
								<a href="{{ route('print',$item->dni)}}" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-print"></span></a>
							</td>

						</tr>
						@endforeach()
					</tbody>
				</table>
				{{$preventa_cliente->render()}}

				@endsection