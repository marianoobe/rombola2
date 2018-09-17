@extends('adminlte::layouts.app')


@section('seccion1')
<div class="container-fluid spark-screen">

	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<!-- 	<h3 class="box-title"></h3>
				     	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-offset-3 col-lg-3">
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="form-group">
								<input type="text" maxlength="125" class="form-control" id="inp-vendedor" placeholder="">
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

	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div ALIGN="center" class="box-header with-border">
					<h3 class="box-title"><strong>BUSCAR CLIENTE</strong></h3>
					<!--	<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>-->
				</div>

				<div class="box-body">

					<div aling="center" class="form-group">
						<label for="buscar_cliente"><strong>DNI</strong></label>
						<input type="number" class="form-control" id="buscar_cliente" name="buscar_cliente" placeholder="Ingrese DNI">
					</div>

					<div class="col-md-14 col-md-offset-0">
						<!-- Default box -->
						<div aria-expanded="false" class="box">
							<div ALIGN="center" class="box-header with-border">
								<h3 class="box-title"><strong>CLIENTE</strong></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Expandir">
										<i class="fa fa-minus"></i></button>
								</div>
							</div>

							<div class="box-body">
								<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="row margenBoot-25">
										<div class="col-xs-12 col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1"><strong>DNI</strong></label>
												<input type="number" class="form-control" id="dni" name="dni">
											</div>
											<div class="form-group">
												<label for="nombre"><strong>Nombre</strong></label>
												<input type="text" class="form-control" id="nombre" name="nombre">
											</div>
											<div class="form-group">
												<label for="apellido"><strong>Apellido</strong></label>
												<input type="text" class="form-control" id="apellido" name="apellido">
											</div>

										</div>
										<div class="col-xs-12 col-lg-6">
											<div class="form-group">
												<label for="email"><strong>Correo Electrónico</strong></label>
												<input type="email" class="form-control" id="email" name="email">
											</div>
											<div class="form-group">
												<label for="usr"><strong>Celular</strong></label>
												<input type="number" class="form-control" id="cel_1" name="cel_1">
											</div>
											<div class="form-group">
												<label for="act_empresa"><strong>Actividad/Empresa</strong></label>
												<input type="text" class="form-control" id="act_empresa" name="act_empresa">
											</div>
										</div>
									</div><!-- /.modal-content -->

							</div>

							<!-- /.box-body -->

						</div>
						<!-- /.box -->

					</div>

				</div>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</div>

	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div ALIGN="center" class="box-header with-border">
					<h3 class="box-title"><strong>DETALLE</strong></h3>
					<!-- 	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<div class="form-group">
						<label for="exampleFormControlTextarea3">Información de documentación,cliente,etc...</label>
						<textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
					</div>
					<!-- /.row -->

				</div>


			</div>



		</div>
	</div>
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div ALIGN="center" class="box-header with-border">
					<h3 class="box-title"><strong>FORMA DE PAGO</strong></h3>
					<!-- 	<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>-->
				</div>

				<div class="box-body">
					<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="row margenBoot-25">
							<div class="col-xs-12 col-lg-6">
								<div class="form-group">
									<label for="usado"><strong>Usado</strong></label>
									<textarea class="form-control rounded-0" id="usado" rows="4"></textarea>
								</div>
								<div class="form-group">
									<label for="contado"><strong>Contado</strong></label>
									<input type="text" class="form-control" id="contado" name="contado">
								</div>
								<div class="form-group">
									<label for="cheques"><strong>Cheques</strong></label>
									<input type="text" class="form-control" id="cheques" name="cheques">
								</div>
								<div class="form-group">
									<label for="cuanto_mes"><strong>Hasta cuanto puede pagar por mes</strong></label>
									<input type="number" class="form-control" id="cuanto_mes" name="cuanto_mes">
								</div>
							</div>
							<div text-align="center" class="col-xs-12 col-lg-6">
								<div class="form-group">
									<label for="tipo_financiacion"><strong>Tipo de Financiación</strong></label>
									<select id="tipo_financiacion" name="tipo_financiacion" class="form-control form-control-sm">
										<option>Propia</option>
										<option>Externa</option>
										<option>Sin Financiación</option>
									</select>
								</div>
								<div class="form-group">
									<label for="nomb_financiera"><strong>Financieras</strong></label>
									<select id="nomb_financiera" name="nomb_financiera" class="form-control form-control-sm">
										<option>Empresa1</option>
										<option>Empresa2</option>
										<option>Empresa3</option>
									</select>
								</div>
								<div class="form-group">
									<label for="cant_cuotas"><strong>Cantidad de cuotas</strong></label>
									<select id="cant_cuotas" name="cant_cuotas" class="form-control form-control-sm">
										<option>8</option>
										<option>12</option>
										<option>24</option>
									</select>
								</div>
								<div class="form-group">
									<label for="impor_finan"><strong>Importe Financiación:</strong></label>
									<input type="number" class="form-control" id="impor_finan" name="impor_finan">
								</div>

							</div>
						</div><!-- /.modal-content -->
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
		@endsection