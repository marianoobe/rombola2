@extends('adminlte::layouts.app')

@section('seccion1')

<div class="container-fluid spark-screen">

	{!! Form::open(['route'=>'pre-venta.store','method'=>'post','class'=>'form-group']) !!}

	<div class="row">

		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box box-primary">
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
								<div class='input-group date'>
									<input type="date" class="form-control" id="fecha_oper" name="fecha_oper">
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
					<label>Estado de la Negociación:</label>
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
			<div class="box box-primary">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">Información del Cliente</h3>
				</div>

				<div class="box-body">

					<ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
							 aria-selected="true">Buscar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
							 aria-selected="false">Nuevo</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<div aling="center" class="form-group">
								<br> </br>
								<input type="number" class="form-control" id="buscar_cliente" name="buscar_cliente" placeholder="Ingrese DNI">
							</div>
						</div>
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
								<div class="panel-body">
									<!-- inicio panel filtros -->

									<div class="box-body">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="row margenBoot-25">
											<div class="col-xs-12 col-lg-6">
												<div class="form-group">
													<label><strong>DNI</strong></label>
													<input type="number" class="form-control" id="dni" name="dni">
												</div>
												<div class="form-group">
													<label><strong>Nombres</strong></label>
													<input type="text" class="form-control" id="nombre" name="nombre">
												</div>
												<div class="form-group">
													<label><strong>Apellidos</strong></label>
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
			<div class="box box-primary">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">Auto de Interes/Detalles</h3>
				</div>

				<div class="box-body">
					<div class="form-group">
						<input type="text" class="form-control" id="auto_interesado" name="auto_interesado" placeholder="Marca - Modelo - Año - Versión ....">
					</div>
					<div class="form-group">
						<label>Información de documentación,cliente,etc...</label>
						<textarea class="form-control" id="detalles" name="detalles" rows="7"></textarea>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box box-primary">
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
								<label><strong>Usado</strong></label>
								<textarea class="form-control rounded-0" id="usado" name="usado" rows="4"></textarea>
							</div>
							<div class="form-group">
								<label><strong>Contado</strong></label>
								<div class="input-group">
									<input class="form-control border-rigth-0" type="text" class="form-control" id="contado" name="contado">
									<span class="input-group-addon bg-white border-left-0"><i class="glyphicon glyphicon-usd"></i></span>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" onclick="javascript:validar_check(this);">Otra forma(cheque,
										tranferencia
										bancaria,etc)</label>
								</div>
								<textarea class="form-control rounded-0" id="otropago" name="otropago" rows="2" ></textarea>
							</div>
							<div class="form-group">
								<label><strong>Hasta cuánto puede pagar por mes</strong></label>
								<input type="number" class="form-control" id="cant_pormes" name="cant_pormes">
							</div>
						</div>
						<div text-align="center" class="col-xs-12 col-lg-6">
							{!! Html::script('js/financiera.js') !!}

							<div class="form-group">
								<label><strong>Tipo de Financiación</strong></label>
								<div>
									{!! Form::select('tipofinanciera',$tipo_finan,null,['class'=>'form-control','id'=>'tipofinanciera']) !!}
								</div>
								<p></p>
							</div>
							<section id="box-financiera" style="display:none" class="box box-default">
								<div class="form-group">
									<label><strong>Financieras</strong></label>
									<div>
										{!! Form::select('nombfinanciera',[],null,['placeholder'=>'','class'=>'form-control','id'=>'nombfinanciera']) !!}
									</div>
									<p></p>
								</div>
							</section>
							<section id="box-cuotas" style="display:none" class="box box-default">
								<div class="form-group">
									<label><strong>Cantidad de Cuotas</strong></label>
									<div>
										{!! Form::select('numcuotas',['placeholder'=>''],null,['placeholder'=>'','class'=>'form-control','id'=>'cantcuotas']) !!}
									</div>
									<p></p>
								</div>
							</section>
							<section id="box-importe" style="display:none" class="box box-default">
								<div class="form-group">
									<label><strong>Importe Financiación:</strong></label>
									<input type="number" class="form-control" id="impor_finan" name="impor_finan">
								</div>
							</section>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-sm-12 col-lg-12">
							<div id="alerta" style="display:none;" class="alert alert-success" role="alert"></div>
						</div>
						<div class="row margenBoot-25" style="margin-top:25px;">
							<div class="col-xs-12 col-lg-12" style="text-align:center;">
								
								{!! Form::submit("Guardar", ['class'=>'btn btn-success']) !!}
								
							</div>
						</div>
						<!-- /.row -->
					</div> 
				</div>
			</div>
		</div>

	</div>
	{!! Form::close() !!}
	@endsection