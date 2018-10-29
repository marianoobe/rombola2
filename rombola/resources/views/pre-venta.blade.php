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
						<a style="margin-bottom:10%;" role="button" href="{{ route('pre-venta.create') }}" class="btn btn-xl btn-success">NUEVA
							PREVENTA</a>
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
							<td>
								@can('vendedor')
								<a href="{{ route('pre-venta.edit',$item->dni)}}" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-search"></span></a>
								@endcan
								@can('admin')
								<form id="myform" action="{{ route('pre-venta.destroy',$item->dni)}}" method="post">
									<a href="{{ route('pre-venta.edit',$item->dni)}}" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-search"></span></a>
									<a href="{{ route('print',$item->dni)}}" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-print"></span></a>
									<input name="_method" type="hidden" value="DELETE" style="display:none">
									<input type="hidden" name="_token" value="{{csrf_token()}}" style="display:none">
									<a href="#" onclick="document.getElementById('myform').submit()" class="btn btn-danger btn-sm">
										<span class="glyphicon glyphicon-trash"></span></a>
								</form> 


								@endcan
							</td>

						</tr>
						@endforeach()
					</tbody>
				</table>
				{{$preventa_cliente->render()}}

				@endsection