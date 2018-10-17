@extends('adminlte::layouts.app')

@section('seccion1')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Ventas</h3>
				</div>
				<div class="box-body">
					<div class="col-sm-4 pull-left">
						<a role="button" href="{{ route('venta.create') }}" class="btn btn-xl btn-success">NUEVA VENTA</a>
					</div>
					<div class="col-sm-4 pull-right">
						<form method="GET" action="{{ route('venta.index') }}" class="navbar-form pull-right" role="search">
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
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Fecha</th>
								<th scope="col">Marca</th>
								<th scope="col">Modelo</th>
								<th scope="col">Dominio</th>
								<th scope="col">Cliente</th>
								<th scope="col">Estado</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody id="myTable">

							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="cursor: default;">
										@can('vendedor')
									<a href="" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-search"></span></a>
										@endcan
									@can('admin')
									<a href="" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-search"></span></a>
									<a href="" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-print"></span></a>
									
									<a onclick="$('#modal-estado').modal('show');" class="btn btn-warning btn-sm">
										<span class="glyphicon glyphicon-refresh"></span></a>
										<a href="{{ route('venta.destroy',"")}}" class="btn btn-danger btn-sm">
												<span class="glyphicon glyphicon-trash"></span></a>
									@endcan
								</td>

							</tr>

						</tbody>
					</table>
					<div id="modal-estado" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
					 style="display: none;">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									<h4 class="modal-title">Cambio de Estado</h4>
								</div>
								<div class="modal-body">
									<label>Estado de la Negociación:</label>
									<select class="form-control" id="sel-estadonegociacion">
										<option value="EN NEGOCIACIÓN">EN NEGOCIACIÓN</option>
										<option value="COMPLETADA">COMPLETADA</option>
										<option value="DADO DE BAJA">DADO DE BAJA</option>
									</select>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
									<button type="button" onclick="changeEstado();" class="btn btn-success">GUARDAR</button>
								</div>
							</div>
						</div>
					</div>

					@endsection