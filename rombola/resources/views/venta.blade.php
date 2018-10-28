@extends('adminlte::layouts.app')

@section('seccion1')
{!! Html::style('js/estilos.css') !!}

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
						<!--<a role="button" href="{{ route('venta.create') }}" class="btn btn-xl btn-success">NUEVA VENTA</a>
						-->
						<a role="button" onclick="$('#modal-menu').modal('show');" class="btn btn-xl btn-success">NUEVA VENTA</a>

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
								<th scope="col">Codigo</th>
								<th scope="col">Estado</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody id="myTable">
								@foreach($venta_operac_0km as $item)
							<tr>
								<td>{{$item->fecha_oper}}</td>
								<td>{{$item->codigo}}</td>
								<td>{{$item->estado}}</td>
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
							@endforeach()
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Cambio de estado -->
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
					<!-- Fin Modal Cambio de estado -->

					<!-- Modal Acceso de estado -->
					<!--Modal -->
					<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog" aria-labelledby="modal-clienteNuevo"
					 aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">×</font>
											</font>
										</span></button>
								</div>
								<div class="modal-body">
										<div class="row margenBoot-25">
											<div class="col-xs-12 col-lg-6">
												<a id="boton" href="{{ route('ventacontado.create') }}" class="btn btn-success btn-block">
													<span class="fa fa-money"> CONTADO</span></a>
											</div>
											<div class="col-xs-12 col-lg-6">
												<div class="col-6">
													<a id="boton" href="{{ route('venta.create') }}" class="btn btn-success btn-block">
														<span class="fa fa-university"> FINANCIACION</span></a>
											</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
										<div class="modal-footer">

										</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Fin Modal Acceso de estado -->
					

					@endsection