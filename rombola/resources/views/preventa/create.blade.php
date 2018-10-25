@extends('adminlte::layouts.app')

@section('seccion')

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
						<a class="btn btn-xs btn-success" onclick="history.back(1);">
							<i class="fa fa-chevron-left"></i> VOLVER</a>
					</div>
				</div>

				<div class="box-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-offset-3 col-lg-3">
							<div class="form-group">
								<div class='input-group date'>
									<input type="text" class="form-control" id="fecha_oper" name="fecha_oper" value="<?php echo date(" d-m-Y ");?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="form-group">
								<input type="text" maxlength="125" class="form-control" id="nom_vendedor" disabled value="{{ Auth::user()->name }}">
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
			<div class="box box-primary">
				<div ALIGN="left" class="box-header with-border">
					<h3 class="box-title">Información del Cliente</h3>
				</div>

				<div class="box-body">
					<input type="text" id="cancer" name="cancer" style="display:none">
					<input type="text" id="tipodni" name="tipodni" style="display:none">
					<div class="row margenBoot-25">
						<div class="col-xs-14 col-lg-6">
							<button onclick="enable_buscar()" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">Buscar
								Cliente</button>
							<section id="buscar" style="display:none">
								<select id="dnis" onchange="obtenervalue()" class="selectpicker" data-live-search="true" data-width="100%"
								 data-size="2">
									@foreach ($nombapell as $item)
									<option value="{{$item}}">{{$item}}</option>
									@endforeach
								</select>

								<br><br><br><br><br><br><br>
							</section>
						</div>
						<div class="col-xs-14 col-lg-6">
							<button onclick="enable_nuevo()" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">Nuevo
								Cliente</button>
						</div>
					</div>
					<section id="nuevo" style="display:none">
						<div class="row margenBoot-25">
							<div class="col-xs-12 col-lg-6">
								<div class="form-group">
									<label><strong>*Nombres</strong></label>
									<input type="text" class="form-control" id="nombre" name="nombre" required>
								</div>
								<div class="form-group">
									<label><strong>*Apellidos</strong></label>
									<input type="text" class="form-control" id="apellido" name="apellido">
								</div>

							</div>
							<div class="col-xs-12 col-lg-6">
								<div class="form-group">
									<label><strong>*Celular</strong></label>
									<input type="text" class="form-control" id="cel_1" name="cel_1">
								</div>
								<div class="form-group">
									<label><strong>Correo Electrónico</strong></label>
									<input type="email" placeholder="email@gmail.com" class="form-control" id="email" name="email">
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
						<input type="text" class="form-control" id="auto_interesado" name="auto_interesado" placeholder="* Marca - Modelo - Año - Versión ...."
						 required>
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
								<label><strong>*Usado</strong></label>
								<textarea class="form-control rounded-0" id="usado" name="usado" rows="4" required></textarea>
							</div>
							<div class="form-group">
								<label><strong>*Contado</strong></label>
								<div class="input-group">
									<input class="form-control border-rigth-0" type="number" class="form-control" id="contado" name="contado"
									 required>
									<span class="input-group-addon bg-white border-left-0"><i class="glyphicon glyphicon-usd"></i></span>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" onclick="javascript:validar_check(this);">Otra forma(cheque,
										tranferencia
										bancaria,etc)</label>
								</div>
								<textarea style="display:none" class="form-control rounded-0" id="otropago" name="otropago" rows="2"></textarea>
							</div>
							<br>
							<div class="form-group">
								<label><strong>*Hasta cuánto puede pagar por mes</strong></label>
								<input type="number" class="form-control" id="cant_pormes" name="cant_pormes" required>
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
									<label><strong>*Financieras</strong></label>
									<div>
										{!! Form::select('nombfinanciera',[],null,['class'=>'form-control','id'=>'nombfinanciera']) !!}
									</div>
									<p></p>
								</div>
							</section>
							<section id="box-cuotas" style="display:none" class="box box-default">
								<div class="form-group">
									<label><strong>*Cantidad de Cuotas</strong></label>
									<div>
										{!! Form::select('numcuotas',[],null,['class'=>'form-control','id'=>'cantcuotas']) !!}
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
	<script>
		$(document).ready(function () {
			$("#cel_1").mask("(999) 999-9999");
		});
	</script>
	@endsection