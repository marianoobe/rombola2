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
						<button type="button" class="btn btn-success btn-block" id="btn-nuevaFicha" data-toggle="modal" data-target="#modal-clienteNuevo"
						 style="margin-bottom:10%;">NUEVA LISTA</button>
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
						<table class="table">
							<caption>Lista de Precios</caption>
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">MES DE LISTA</th>
									<th scope="col">MARCA</th>									
									<th scope="col">VER</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>OCTUBRE</td>
									<td style="cursor: default;">
										<img src={{url('img/marcas/chevrolet.jpg')}} alt="..." class="img-responsive" style="width: 80px; height: 80px;" />
									</td>


									<td style="cursor: default;">
										<a target="_blank" href="{{ url("storage/listas/chevrolet.pdf")}}" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-search"></span></a>

									</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>OCTUBRE</td>
									<td style="cursor: default;">
										<img src={{url('img/marcas/volkswagen.jpg')}} alt="..." class="img-responsive" style="width: 80px; height: 80px;" />
									</td>


									<td style="cursor: default;">
										<a target="_blank" href="{{ url("storage/listas/vw.pdf")}}" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-search"></span></a>

									</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>SEPTIEMBRE</td>
									<td style="cursor: default;">
										<img src={{url('img/marcas/toyota.jpg')}} alt="..." class="img-responsive" style="width: 80px; height: 80px;" />
									</td>


									<td style="cursor: default;">
										<a target="_blank" href="{{ url("storage/listas/toyota.pdf")}}" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-search"></span></a>

									</td>
								</tr>
							</tbody>

						</table>
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
													<font style="vertical-align: inherit;">NUEVA LISTA</font>
													<h6 style="vertical-align: inherit;">*campos obligatorios</h6>
												</font>
											</h4>
										</div>
										<div class="modal-body">
											<form method="POST" action="" enctype="multipart/form-data">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<div class="row margenBoot-25">
													<div class="col-xs-12 col-lg-6">
														<div class="form-group">
															<label><strong>*MARCA DE VEHICULO</strong></label>
															<select id="marca" name="marca" class="selectpicker show-tick" data-show-subtext="true" data-live-search="true"
															 data-style="btn-primary" data-placeholder="Seleccione marca vehiculo..." data-width="100%">
																<option value="">Seleccionar marca del vehiculo</option>

																<option value="1">Chevrolet</option>
																<option value="2">Fiat</option>
																<option value="3">Peugeot</option>
																<option value="4">Renault</option>
																<option value="5">Toyota</option>
																<option value="6">VW</option>
																<option value="7">Nisan</option>
																<option value="8">Ford</option>
															</select>

														</div>
													</div>

													<div class="col-xs-12 col-lg-6">
														<div class="form-group">
															<label><strong>MES DE LISTA</strong></label>
															<input type="month"  id="mes" name="mes">
														</div>
													</div>

													<div class="col-xs-12 col-lg-6">

														<div class="col-xs-12 col-lg-6">
															<div class="form-group">
																<label><strong>Añadir Lista</strong></label>
																<input type="file" id="pdf" name="pdf">
															</div>
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



						
								
								

@endsection

