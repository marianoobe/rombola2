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
						</div>
						<thead>
							<tr>
								<th scope="col">DNI</th>
								<th scope="col">Nombre y Apellido</th>
								<th scope="col">Email</th>
								<th scope="col">Teléfono</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
						</tbody>
					</table>

					<!-- Modal -->
					<div class="modal fade" id="modal-newclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					    aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="exampleInputEmail1"><strong>DNI</strong></label>
											<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Nombre y Apellido</strong></label>
											<input type="text" class="form-control" id="usr">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1"><strong>Correo Electrónico</strong></label>
											<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Teléfono</strong></label>
											<input type="number" class="form-control" id="usr">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Actividad/Empresa</strong></label>
											<input type="text" class="form-control" id="usr">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Fecha de Nacimiento</strong></label>
											<input type="text" class="form-control" id="usr">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Domicilio</strong></label>
											<input type="text" class="form-control" id="usr">
										</div>
										<div class="form-group">
											<label for="usr"><strong>Estado Civil</strong></label>
											<select class="form-control form-control-sm">
												<option>Soltero</option>
												<option>Casado</option>
												<option>Divorciado</option>
											</select>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary">Nuevo</button>
								</div>
							</div>
						</div>
					</div>



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
										</font>
									</h4>
								</div>
								<div class="modal-body">
									<div class="row margenBoot-25">
										<div class="col-xs-12 col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1"><strong>DNI</strong></label>
												<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
											</div>
											<div class="form-group">
												<label for="usr"><strong>Nombre y Apellido</strong></label>
												<input type="text" class="form-control" id="usr">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1"><strong>Correo Electrónico</strong></label>
												<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
											</div>
											<div class="form-group">
												<label for="usr"><strong>Teléfono Fijo</strong></label>
												<input type="number" class="form-control" id="usr">
											</div>
											<div class="form-group">
												<label for="usr"><strong>Celular 2</strong></label>
												<input type="number" class="form-control" id="usr">
											</div>
										</div>
										<div class="col-xs-12 col-lg-6">
											<div class="form-group">
												<label for="usr"><strong>Actividad/Empresa</strong></label>
												<input type="text" class="form-control" id="usr">
											</div>
											<div class="form-group">
												<label for="usr"><strong>Fecha de Nacimiento</strong></label>
												<input type="text" class="form-control" id="usr">
											</div>
											<div class="form-group">
												<div class="form-group">
													<label for="usr"><strong>Domicilio</strong></label>
													<input type="text" class="form-control" id="usr">
												</div>
												<div class="form-group">
													<label for="usr"><strong>Celular 1</strong></label>
													<input type="number" class="form-control" id="usr">
												</div>
												<div class="form-group">
													<label for="usr"><strong>Estado Civil</strong></label>
													<select class="form-control form-control-sm">
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
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" id="btn-cerrarCliente" data-dismiss="modal">
										Cerrar
									</button>
									<button type="button" class="btn btn-primary" id="btn-guardarCliente" onclick=" guardarCliente();">
										Guardar
									</button>
								</div>

								@endsection