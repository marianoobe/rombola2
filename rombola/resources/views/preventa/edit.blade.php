@extends('adminlte::layouts.app')

@section('seccion1')
<div class="container-fluid spark-screen">
	@foreach($preventa as $item)
	@endforeach()
	<form method="POST" action="{{ route('pre-venta.update',$item->idpersona) }}">
			<input name="_method" type="hidden" value="PATCH">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
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
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>

					<div class="box-body">
						<div class="row margenBoot-25">
							<div class="col-xs-12 col-lg-offset-3 col-lg-3">
								<div class="form-group">
									<div class='input-group date' id='fecha_preventa'>
										<input type='text' class="form-control" value="{{ $item->fecha_oper }}" disabled="disabled" />
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
		</div>

		<div class="row">
			<div class="col-md-14 col-md-offset-0">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cliente</h3>
					</div>

					<div class="box-body">

						<div class="form-group">
							<label><strong>DNI</strong></label>
							<input type="number" class="form-control" id="dni" name="dni" value="{{ $item->dni }}" disabled="disabled">
						</div>

						<div class="form-group">
							<label>Nombres:</label>
							<input type="text" class="form-control" name="nombre" value="{{ $item->nombre }}" disabled="disabled" />
						</div>
						<div class="form-group">
							<label>Apellidos:</label>
							<input type="text" class="form-control" name="apellido" value="{{ $item->apellido }}" disabled="disabled" />
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
						<h3 class="box-title">Auto Interesado/Detalles</h3>
					</div>

					<div class="box-body">
						<div class="form-group">
							<label><strong>Auto Interesado</strong></label>
							<input type="text" class="form-control" id="auto_interesado" name="auto_interesado" value="{{ $item->auto_interesado }}"
							 disabled="disabled">
						</div>
						<div class="form-group">
							<label>Información de documentación,cliente,etc...</label>
							<textarea class="form-control" id="detalle" rows="7" disabled="disabled">{{ $item->detalles }}</textarea>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

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
										<textarea class="form-control" id="usado" rows="2" disabled="disabled">{{ $item->usado }}</textarea>
									<p></p>
								</div>
								<div class="form-group">
										<label><strong>Contado</strong></label>
										<div class="input-group">
											<input class="form-control border-rigth-0" type="text" class="form-control" id="contado" name="contado" value="{{ $item->contado }}"
											 disabled="disabled">
											<span class="input-group-addon bg-white border-left-0"><i class="glyphicon glyphicon-usd"></i></span>
										</div>
									</div>
									<div class="form-group">
										<label><strong>Otra Forma de Pago</strong></label>
										<input class="form-control border-rigth-0" type="text" class="form-control" id="otropago" name="otropago" value="{{ $item->otropago }}" disabled="disabled">
									</div>
									<div class="form-group">
										<label><strong>Hasta cuanto puede pagar por mes</strong></label>
										<input type="number" class="form-control" id="cant_pormes" name="cant_pormes" value="{{ $item->cant_pormes }}"
										 disabled="disabled">
									</div>
							</div>

							<div class="col-xs-12 col-lg-6">								
									<div class="form-group">
										<label><strong>Tipo de Financiación</strong></label>
										<input type="text" class="form-control" id="tipofinanciera" name="tipofinanciera" value="{{ $item->nombretipo }}"
										 disabled="disabled">
										<p></p>
									</div>
									<div class="form-group">
										<label><strong>Financiera</strong></label>
										<input type="text" class="form-control" id="nombfinanciera" name="nombfinanciera" value="{{ $item->nomb_financ }}"
										 disabled="disabled">
										<p></p>
									</div>
									<div class="form-group">
										<label><strong>Cantidad de Cuotas</strong></label>
										<input type="text" class="form-control" id="cantcuotas" name="cantcuotas" value="{{ $item->numcuotas }}"
										 disabled="disabled">
										<p></p>
									</div>
									<div class="form-group">
										<label><strong>Importe</strong></label>
										<input type="text" class="form-control" id="importe" name="importe" value="{{ $item->importe_finan }}" disabled="disabled">
										<p></p>
									</div>
								</div>
	

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

</form>

@endsection