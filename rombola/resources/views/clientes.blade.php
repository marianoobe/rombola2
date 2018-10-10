@extends('adminlte::layouts.app')

@section('seccion')
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
						<div class="row">
							<div class="col-sm-6">
								<div id="example_filter" class="dataTables_filter">
									<label><input id="myInput" type="text" class="form-control" placeholder="Buscar" aria-controls="example"></label>
								</div>
							</div>
						</div>

						<thead>
							<tr>
								<th scope="col">DNI</th>
								<th scope="col">Nombres y Apellidos</th>
								<th scope="col">Email</th>
								<th scope="col">Domicilio</th>
								<th scope="col">Teléfono</th>
								<th scope="col">Estado de Ficha</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody id="myTable">
							@foreach($client_pers as $item)
							<tr>
								<td>{{$item->dni}}</td>
								<td>{{$item->nombre}} {{$item->apellido}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->domicilio}}</td>
								<td>{{$item->num_tel}}</td>
								<td> <span class="label label-info">{{$item->estado_ficha}}</span></td>
								<td style="cursor: default;">
									<a href="{{ route('clientes.edit',$item->dni)}}" class="btn btn-primary btn-sm">
                                     <span class="glyphicon glyphicon-search"></span></a>							
								</td>
							</tr>
							@endforeach()
						</tbody>
					</table>
					{{$client_pers->render()}}
					

					<!--Modal -->
					<div class="modal fade" id="modal-clienteNuevo" tabindex="-1" role="dialog" aria-labelledby="modal-clienteNuevo"
					 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">×</font>
											</font>
										</span></button>
									<h4 class="modal-title">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">NUEVO CLIENTE</font>
											<h6 style="vertical-align: inherit;">*campos obligatorios</h6>
										</font>
									</h4>
								</div>
								<div class="modal-body">
									<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="row margenBoot-25">
											<div class="col-xs-12 col-lg-6">
												<div class="form-group">
													<label><strong>*DNI</strong></label>
													<input type="number" class="form-control" id="dni" name="dni" required>
												</div>
												<div class="form-group">
													<label><strong>*Nombres</strong></label>
													<input type="text" class="form-control" id="nombre" name="nombre" required>
												</div>
												<div class="form-group">
													<label><strong>*Apellidos</strong></label>
													<input type="text" class="form-control" id="apellido" name="apellido" required>
												</div>
												<div class="form-group">
													<label><strong>*Correo Electrónico</strong></label>
													<input type="email" class="form-control" id="email" name="email" required>
												</div>
												<div class="form-group">
														<label><strong>*Celular</strong></label>
														<input type="number" class="form-control" id="cel_1" name="cel_1" required>
													</div>
											
												<div class="form-group">
													<label><strong>Otro (opcional)</strong></label>
													<input type="number" class="form-control" id="cel_2" name="cel_2">
												</div>
											</div>
											<div class="col-xs-12 col-lg-6">
												<div class="form-group">
													<label><strong>*Actividad/Empresa</strong></label>
													<input type="text" class="form-control" id="act_empresa" name="act_empresa" required>
												</div>
												<div class="form-group">
													<label><strong>*Fecha de Nacimiento</strong></label>
													<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
												</div>
												<div class="form-group">
													<div class="form-group">
														<label><strong>*Domicilio</strong></label>
														<input type="text" class="form-control" id="domicilio" name="domicilio" required>
													</div>
													<div class="form-group">
														<label><strong>*Estado Civil</strong></label>
														<select id="estado_civil" name="estado_civil" class="form-control form-control-sm">
															<option>Soltero</option>
															<option>Convive</option>
															<option>Casado</option>
															<option>Divorciado</option>
															<option>Viudo</option>
														</select>
													</div>
													

												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
											<button type="submit" onclick="realizaProceso($('#estado_civil').val())" class="btn btn-primary">Guardar</button>
										</div>
								</div>

								</form>
							</div>
						</div>
					</div>
					<script>
						function realizaProceso(valorCaja1) {
							var parametros = {
								"valorCaja1": valorCaja1
							};
							$.ajax({
								data: parametros, //datos que se envian a traves de ajax
								url: 'clientes.store', //archivo que recibe la peticion
								type: 'post', //método de envio
								beforeSend: function () {
									$("#resultado").html("Procesando, espere por favor...");
								},
								success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
									$("#resultado").html(response);
								}
							});
						}

						$(document).ready(function(){
							$("#myInput").on("keyup", function() {
							  var value = $(this).val().toLowerCase();
							  $("#myTable tr").filter(function() {
								$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							  });
							});
						  });
					</script>
					@endsection