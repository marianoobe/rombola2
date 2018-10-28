@extends('adminlte::layouts.app')

@section('seccion')

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box">
				<div class="box-header with-border">


					<!-- Default box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">LISTAS DE AUTOS 0KM</h3>
							<div class="col-sm-offset-10">
								<button type="button" class="btn btn-success btn-block" id="btn-nuevaFicha" data-toggle="modal" data-target="#modal-listaNuevo"
								 style="margin-bottom:10%;">NUEVA LISTA</button>
							</div> 
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>

							</div>
						</div>
						<div class="box-body">
							<table class="table table-striped">
								<table class="table">
									<caption>Lista de Precios</caption>
									<thead>
										<tr>
											
											<th scope="col">MES DE LISTA</th>
											<th scope="col">MARCA</th>
											<th scope="col">LOGO</th>
											<th scope="col">VER</th>

										</tr>
									</thead>
									<tbody>
										@foreach ($lista as $item)


										<tr>
											
											<td>{{$item->fechalista}}</td>
											<td>{{$item->nombre}}</td>
											<td style="cursor: default;">
												<img src={{url("img/marcas/$item->nombre.jpg")}} alt="..." class="img-responsive" style="width: 80px; height: 80px;" />
											</td>


											<td style="cursor: default;">
												<a target="_blank" href="{{ url("$rutalista$item->rutalista")}}" class="btn btn-info btn-sm">
													<span class="glyphicon glyphicon-search"></span></a>

											</td>
										</tr>
										@endforeach

									</tbody>

								</table>


								<!--Modal -->
								<div class="modal fade" id="modal-listaNuevo" tabindex="-1" role="dialog" aria-labelledby="modal-listaNuevo"
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
														<font style="vertical-align: inherit;">NUEVA LISTA</font>
														<h6 style="vertical-align: inherit;">*campos obligatorios</h6>
													</font>
												</h4>
											</div>
											<div class="modal-body">
												<form  method="POST" action="{{ route('listaprecios.store') }}" enctype="multipart/form-data">

													<input type="hidden" name="_token" value="{{csrf_token()}}">
													<div class="box-body">														
														<div class="form-group">
														
																<div class=" col-xs-12" style="background-color:rgb(229, 245, 253);">
																	<label><strong>*MARCA DE VEHICULO</strong></label>
																	<select id="marcas" name="marcas" class="selectpicker show-tick" data-show-subtext="true"
																	 data-live-search="true" data-style="btn-primary" data-placeholder="Seleccione marca vehiculo..."
																	 data-width="100%">
																		<option value="">Seleccionar marca del vehiculo</option>
																		@foreach ($marcas as $item)
																		<option value={{$item->id_marca}}> {{ $item->nombre }} </option>
																		@endforeach

																	</select>
																</div>
														<br>
														<br>
														</div>

														
														
															<div class="form-group">
															
																<div class=" col-xs-12" style="background-color:rgb(229, 245, 253);">
																
																	<br>
																	<br>
																		<label><strong>FECHA DE LISTA</strong></label>
																		<input type="date" id="fecha" name="fecha">
																	</div>
																</div>
															
															<div class="form-group">
																
																<div class=" col-xs-12" style="background-color:rgb(229, 245, 253);">
																	<br>
																	<br>
																	<label><strong>Archivo a subir (Formato: PDF)</strong></label>
																	<input type="file" class="form-control" id="file" name="file" required>
																</div>
															</div>
															
														</div>

														<div class="success">
															
															<br>
															<div class="modal-footer">
																<div class="row margenBoot-25" style="margin-top:25px;">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																	<button type="submit" onclick="realizaProceso($('#marcas').val())" class="btn btn-primary">Guardar</button>
																</div>
															</div>
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
												url: 'listaprecios.store', //archivo que recibe la peticion
												type: 'post', //método de envio
												beforeSend: function () {
													$("#resultado").html("Procesando, espere por favor...");
												},
												success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
													$("#resultado").html(response);
												}
											});
										}
									</script>


									{{$lista->render()}}

									@endsection