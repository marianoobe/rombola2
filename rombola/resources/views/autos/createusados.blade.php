@extends('adminlte::layouts.app')


@section('seccion')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box">
				<div class="box-header with-border">


					<!-- Default box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">AGREGAR AUTO USADO</h3>

							<div class="box-tools pull-right">
								<a class="btn btn-xs btn-success" onclick="history.back(1);">
									<i class="fa fa-chevron-left"></i> VOLVER</a>
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>

							</div>
						</div>
						<div class="box-header">


						</div>

						<div class="box-body">
							<form method="POST" action="{{ route('autos.store') }}" enctype="multipart/form-data">

								{{ csrf_field() }}
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" id="usado" name="usado" value="usado">
								<div class="row margenBoot-25">
									<div class="col-xs-12 col-lg-6">

										<div class="form-group">

											<label><strong>*MARCA DE VEHICULO</strong></label>
											<select id="marca" name="marca" class="selectpicker show-tick" data-show-subtext="true" data-live-search="true"
											 data-size=4 data-style="btn-primary" data-placeholder="Seleccione marca vehiculo..." data-width="100%">
												<option value="">Seleccionar marca del vehiculo</option>
												@foreach ($marcas as $item){
												<option value="{{$item->id_marca}}"> {{ $item->nombre }} </option>
												}
												@endforeach

											</select>


										</div>
										<div class="form-group">
											<label for="modelo"><strong>Modelo</strong></label>
											<input type="text" class="form-control" id="modelo" name="modelo" required>
										</div>
										<div class="form-group">
											<label for="version"><strong>Version</strong></label>
											<input type="text" class="form-control" id="version" name="version" required>
										</div>
										<div class="form-group">
											<label for="titular"><strong>Titular</strong></label>
											<input type="text" class="form-control" id="titular" name="titular" required>
										</div>
										<div class="form-group">

											<div class="col-xs-12 col-lg-3">
												<label><strong>Patente Mercosur</strong></label>
												<input id="check_patente" name="check_patente" onchange="validar_check_patente(this);" type="checkbox"
												 data-style="slow" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No">
											</div>
											<div class="col-xs-12 col-lg-3">
												<div class="form-group">
													<label><strong>Dominio</strong></label>
													<input type="text" style="text-transform: uppercase;" maxlength="10" class="form-control" id="dominio"
													 name="dominio" name="dominio" placeholder="" required>
												</div>
											</div>
											<div class="col-xs-12 col-lg-3">
												<div class="form-group">
													<label for="anio"><strong>Año</strong></label>
													<input type="number" class="form-control" id="anio" name="anio" required>
												</div>
											</div>
										</div>




									</div>
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<label for="color"><strong>Color</strong></label>
											<input type="text" class="form-control" id="color" name="color" required>
										</div>



									</div>

									<div class="col-xs-12 col-lg-6">



										<div class="form-group">
											<label for="motor_num"><strong>Fecha de Ingreso</strong></label>
											<input type="date" class="form-control" id="fecha" name="fecha">
										</div>
										<div class="form-group">
											<label for="estado"><strong>Estado</strong></label>
											<select id="estado" name="estado" class="form-control form-control-sm" required>
												<option>Disponible</option>
												<option>En Tramite</option>

											</select>

										</div>
										<div class="form-group">
											<label for="inp-montoCuota"><strong>Valor del vehiculo</strong></label>
											<input type="text" maxlength="65" class="form-control" name="precio" id="precio"
											 placeholder="">
										</div>

									</div>
								</div>

								<div class="success">
									<div class="row margenBoot-25" style="margin-top:25px;">
										<div class="col-xs-12 col-lg-12" style="text-align:center;">
											<button type="submit" onclick="realizaProceso($('#marca').val())" class="btn btn-primary">
												Guardar</button>
										</div>
									</div>
								</div>
							</form>
						</div>


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
						url: 'autos.store', //archivo que recibe la peticion
						type: 'post', //método de envio
						beforeSend: function () {
							$("#resultado").html("Procesando, espere por favor...");
						},
						success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
							$("#resultado").html(response);
						}
					});
				}

				$(document).ready(function($){

					$('#precio').mask("$"+"000.000.000.000.000");			  
				  
				  });
			</script>



			@endsection