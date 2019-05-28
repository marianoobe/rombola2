@extends('adminlte::layouts.app')

@section('seccion')
<meta name="csrf-token" content="<?= csrf_token() ?>">
</meta>

@if(session()->has('success'))
<div class="container-fluid">
	<div id="algo" class="alert alert-success" role="alert">{{session('success')}}</div>
</div>
<script>
	$("#algo").fadeTo(2000, 500).slideUp(500, function () {
		$("#algo").slideUp(500);
	});
</script>
@endif
@if(session()->has('danger'))
<div class="alert alert-danger" role="alert">{{session('danger')}}</div>
@endif
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Clientes</h3>
				</div>
				<div class="box-body">

					<div class="row">
						<div class="col-sm-4 pull-left">
							<button type="button" class="btn btn-primary btn-block" id="btn-nuevaFicha"
								data-toggle="modal" data-target="#modal-clienteNuevo" style="margin-bottom:10%;">NUEVO
								CLIENTE</button>

						</div>
						<div class="col-sm-4 pull-right">
							<form method="GET" action="{{ route('clientes.index') }}" class="navbar-form pull-right"
								role="search">
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
					<div class="table-responsive">
					<table class="table table-striped">
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
								@php
								if($item->estado_ficha == "Completa"){$clase="label-success";}
								else{$clase="label-danger";}
								@endphp

								<td> <span id="estado_ficha"
										class={{$clase}}><strong>{{$item->estado_ficha}}</strong></span></td>
								<td style="cursor: default;">
									@can('vendedor')
									<a href="{{ route('clientes.edit',$item->dni)}}" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-search"></span></a>
									@endcan
									@can('admin')
									<form id="myform" action="{{ route('clientes.destroy',$item->dni)}}" method="post">
										<input name="_method" type="hidden" value="DELETE" style="display:none">
										<input type="hidden" name="_token" value="{{csrf_token()}}"
											style="display:none">
										<a href="{{ route('clientes.edit',$item->dni)}}" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-search"></span></a>
										<a data-toggle="modal" data-target="#modal-confirm"
											class="btn btn-danger btn-sm">
											<span class="glyphicon glyphicon-trash"></span></a>

									</form>
									@endcan
								</td>
							</tr>

							<!-- Modal Confirmacion -->
							<div id="modal-confirm" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog"
								aria-labelledby="modal-confirm" style="display: none;">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-body">
											<img id="cargando" style="display:none;" src="/img/cargando.gif"></img>
											<h4>¿Está seguro de eliminar este cliente?</h4>

										</div>
										<div class="modal-footer">
											<input name="_method" type="hidden" value="DELETE" style="display:none">
											<input type="hidden" name="_token" value="{{csrf_token()}}"
												style="display:none">

											<button type="button" class="btn btn-default"
												data-dismiss="modal">Cancelar</button>
											<button type="button" onclick="delete_client( {{$item->idcliente}} );"
												class="btn btn-default">Aceptar</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Fin Modal Confirmacion -->
							@endforeach()
						</tbody>
					</table>
				    </div>


					{{$client_pers->render()}}


					<!--Modal -->
					<div class="modal fade" id="modal-clienteNuevo" tabindex="-1" role="dialog"
						aria-labelledby="modal-clienteNuevo" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">
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
									<form method="POST" action="{{ route('clientes.store') }}"
										enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<input type="number" id="id_user" name="id_user" style="display:none"
											value="{{ Auth::user()->id }}">
										<div class="row margenBoot-25">
											<div class="col-xs-12 col-lg-6">
												<div class="form-group">
													<label><strong>*DNI</strong></label>
													<input type="text" class="form-control" id="dni" name="dni"
														required>
												</div>
												<div class="form-group">
													<label><strong>*Nombres</strong></label>
													<input type="text" class="form-control" id="nombre" name="nombre"
														required>
												</div>
												<div class="form-group">
													<label><strong>*Apellidos</strong></label>
													<input type="text" class="form-control" id="apellido"
														name="apellido" required>
												</div>
												<div class="form-group">
													<label><strong>*Correo Electrónico</strong></label>
													<input type="email" placeholder="email@gmail.com"
														class="form-control" id="email" name="email" required>
												</div>
												<div class="form-group">
													<label><strong>*Celular</strong></label>
													<input type="text" class="form-control" id="cel_1" name="cel_1"
														required>
												</div>

												<div class="form-group">
													<label><strong>Otro (opcional)</strong></label>
													<input type="text" class="form-control" id="cel_2" name="cel_2">
												</div>
											</div>
											<div class="col-xs-12 col-lg-6">
												<div class="form-group">
													<label><strong>*Actividad/Empresa</strong></label>
													<input type="text" class="form-control" id="act_empresa"
														name="act_empresa" required>
												</div>

												<div class="form-group">
													<label><strong>*Fecha de Nacimiento</strong></label>
													<input type="date" class="form-control" id="fecha_nac"
														name="fecha_nac" required>
												</div>
												<div class="form-group">
													<div class="form-group">
														<label><strong>*Domicilio</strong></label>
														<input type="text" class="form-control" id="domicilio"
															name="domicilio" required>
													</div>
													<div class="form-group">
														<label><strong>*Estado Civil</strong></label>
														<select id="estado_civil" name="estado_civil"
															class="form-control form-control-sm">
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
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Cerrar</button>
											<button type="submit" onclick="realizaProceso($('#estado_civil').val())"
												class="btn btn-primary">Guardar</button>
										</div>
								</div>

								</form>
							</div>
						</div>
					</div>


					<script>
						function delete_client(idcliente) {

							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
							});

							$("#cambio_estado").css("display", "none");
							$("#cargando").css("display", "inline");

							$.ajax({
								type: 'POST',
								url: '/delete',
								data: {
									idcliente: idcliente
								},
								success: function (data) {
									$('#modal-confirm').modal('hide');
									$("#cargando").css("display", "none");
									location.reload();

								}
							});
						}

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

						$(document).ready(function () {
							console.log(document.getElementById("estado_ficha").value);

							if (document.getElementById("estado_ficha").value == "Completa") {
								$("#estado_ficha").addClass("label label-success");
							}

							$("#myInput").on("keyup", function () {
								var value = $(this).val().toLowerCase();
								$("#myTable tr").filter(function () {
									$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
								});
							});
						});

						
					</script>

					@endsection