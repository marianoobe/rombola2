@extends('adminlte::layouts.app')


@section('seccion1')
<div class="container-fluid spark-screen">
        @foreach($client as $item)
        @endforeach()
<form method="POST" action="{{ route('clientes.update',$item->idpersona) }}">
	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Inicio de Negociación</h3>
					<!--<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
					<div class="box-tools pull-right">
						<a class="btn btn-xs btn-primary" onclick="history.back(1);">
							<i class="fa fa-chevron-left"></i> VOLVER</a>
						<button type="button" onclick="$('#modal-estado').modal('show');" class="btn btn-xs btn-warning">Cambiar Estado</button>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-offset-3 col-lg-3">
							<div class="form-group">
								<div class='input-group date' id='fecha_preventa'>
									<input type='date' class="form-control" value={{ $item->fecha_oper }} disabled="disabled"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="form-group">
								<input type="text" maxlength="125" class="form-control" id="nom_vendedor" disabled="disabled" value="{{ Auth::user()->name }}">
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</div>

	<div id="modal-estado" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	 style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Cambio de Estado</h4>
				</div>
				<div class="modal-body">
					<label for="inp-estado">Estado de la Negociación:</label>
					<select class="form-control" id="sel-estadonegociacion">
						<option value="INTERESADO">INTERESADO</option>
						<option value="CLIENTE">CLIENTE</option>
						<option value="CLIENTE ACTIVO">CLIENTE ACTIVO</option>
						<option value="NEGOCIANDO">NEGOCIANDO</option>
						<option value="DESINTERESADO">DESINTERESADO</option>
						<option value="COMPETENCIA">COMPETENCIA</option>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
					<button type="button" onclick="changeEstado();" class="btn btn-success">GUARDAR</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">Buscar Cliente</h3>
				</div>

				<div class="box-body">

					<div aling="center" class="form-group">
						<label for="buscar_cliente"><strong>DNI</strong></label>
						<input type="number" class="form-control" id="buscar_cliente" name="buscar_cliente" placeholder="Ingrese DNI">
					</div>

					<div ALIGN="center" class="col-md-14 col-md-offset-0">
						<!-- Default box -->
						<p><span style="cursor:pointer;" class="glyphicon glyphicon-triangle-bottom" data-toggle="collapse" data-target="#collapseExample"
							 aria-expanded="false" aria-controls="collapseExample">
							</span></p>

						<div class="collapse in" id="collapseExample" aria-expanded="false" style="">
							<div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
								<div class="panel-body">
									<!-- inicio panel filtros -->

									<div class="box-body">
										<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<div class="row margenBoot-25">
												<div class="col-xs-12 col-lg-6">
													<div class="form-group">
														<label><strong>DNI</strong></label>
														<input type="number" class="form-control" id="dni" name="dni">
													</div>
													<div class="form-group">
														<label><strong>Nombre</strong></label>
														<input type="text" class="form-control" id="nombre" name="nombre">
													</div>
													<div class="form-group">
														<label><strong>Apellido</strong></label>
														<input type="text" class="form-control" id="apellido" name="apellido">
													</div>

												</div>
												<div class="col-xs-12 col-lg-6">
													<div class="form-group">
														<label><strong>Correo Electrónico</strong></label>
														<input type="email" class="form-control" id="email" name="email">
													</div>
													<div class="form-group">
														<label><strong>Celular</strong></label>
														<input type="number" class="form-control" id="cel_1" name="cel_1">
													</div>
													<div class="form-group">
														<label><strong>Actividad/Empresa</strong></label>
														<input type="text" class="form-control" id="act_empresa" name="act_empresa">
													</div>
												</div>
											</div><!-- /.modal-content -->

									</div>

									<!-- fin panel filtros -->
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">Auto Interesado/Detalles</h3>
				</div>

				<div class="box-body">
					<div class="form-group">
						<label><strong>Auto Interesado</strong></label>
						<input type="text" class="form-control" id="auto_interesado" name="auto_interesado" value={{ $item->auto_interesado }} disabled="disabled">
					</div>
					<div class="form-group">
						<label>Información de documentación,cliente,etc...</label>
						<textarea class="form-control" id="detalle" rows="7" value={{ $item->detalles }} disabled="disabled"></textarea>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">FORMA DE PAGO</h3>
					<!-- 	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-6">
							<div class="form-group">
								<label for="usado"><strong>Usado</strong></label>
								<textarea class="form-control rounded-0" id="usado" rows="4" value={{ $item->usado }} disabled="disabled"></textarea>
							</div>
							<div class="form-group">
								<label><strong>Contado</strong></label>
								<div class="input-group">
									<input class="form-control border-rigth-0" type="text" class="form-control" id="contado" name="contado" value={{ $item->contado }} disabled="disabled">
									<span class="input-group-addon bg-white border-left-0"><i class="glyphicon glyphicon-usd"></i></span>
								</div>
							</div>
							<div class="form-group">
								<label for="cheques"><strong>Cheques</strong></label>
								<input type="text" class="form-control" id="cheques" name="cheques" value={{ $item->cheques }} disabled="disabled">
							</div>
							<div class="form-group">
								<label for="cuanto_mes"><strong>Hasta cuanto puede pagar por mes</strong></label>
								<input type="number" class="form-control" id="cant_pormes" name="cant_pormes" value={{ $item->cant_pormes }} disabled="disabled">
							</div>
						</div>
						<div text-align="center" class="col-xs-12 col-lg-6">
							<div class="form-group">
								<label for="tipo_financiacion"><strong>Tipo de Financiación</strong></label>
								<select id="tipo_financiacion" name="tipo_financiacion" class="form-control form-control-sm" disabled="disabled">
									<option>Propia</option>
									<option>Externa</option>
									<option>Sin Financiación</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nomb_financiera"><strong>Financieras</strong></label>
								<select id="nomb_financiera" name="nomb_financiera" class="form-control form-control-sm" disabled="disabled">
									<option>Empresa1</option>
									<option>Empresa2</option>
									<option>Empresa3</option>
								</select>
							</div>
							<div class="form-group">
								<label for="cant_cuotas"><strong>Cantidad de cuotas</strong></label>
								<select id="cant_cuotas" name="cant_cuotas" class="form-control form-control-sm" disabled="disabled">
									<option>8</option>
									<option>12</option>
									<option>24</option>
								</select>
							</div>
							<div class="form-group">
								<label for="impor_finan"><strong>Importe Financiación:</strong></label>
								<input type="number" class="form-control" id="impor_finan" name="impor_finan" value={{ $item->importe_finan }} disabled="disabled">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-sm-12 col-lg-12">
							<div id="alerta" style="display:none;" class="alert alert-success" role="alert"></div>
						</div>
						<div class="row margenBoot-25" style="margin-top:25px;">
							<div class="col-xs-12 col-lg-12" style="text-align:center;">
								<button type="button" id="btn-guardar" data-loading-text="GUARDANDO..." class="btn btn-success" onclick="guardar();">GUARDAR</button>
							</div>
						</div>
						<!-- /.row -->
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	@endsection