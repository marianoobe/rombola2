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
							<h3 class="box-title">AGREGAR AUTO USADO</h3>

							<div class="box-tools pull-right">
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

								<div class="row margenBoot-25">
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<input type="hidden" id="usado" name="usado" value="usado">
											<label for="marca"><strong>Marca</strong></label>
											<input type="text" class="form-control" id="marca" name="marca" required>
										</div>
										<div class="form-group">
											<label for="modelo"><strong>Modelo</strong></label>
											<input type="text" class="form-control" id="modelo" name="modelo" required>
										</div>
										<div class="form-group">
											<label for="version"><strong>Versión</strong></label>
											<input type="text" class="form-control" id="version" name="version" required>
										</div>
										<div class="form-group">
											<label for="dominio"><strong>Dominio</strong></label>
											<input type="text" class="form-control" id="dominio" name="dominio" required>
										</div>
										<div class="form-group">
											<label for="titular"><strong>Titular</strong></label>
											<input type="text" class="form-control" id="titular" name="titular" required>
										</div>
										<div class="form-group">
											<label for="anio"><strong>Año</strong></label>
											<input type="number" class="form-control" id="anio" name="anio" required>
										</div>
									</div>
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<label for="color"><strong>Color</strong></label>
											<input type="text" class="form-control" id="color" name="color" required>
										</div>
										<div class="form-group">
											<label for="estado"><strong>Combustible</strong></label>
											<select id="combustible" name="combustible" class="form-control form-control-sm" required>
												<option>NAFTA</option>
												<option>DIESEL</option>
												<option>GNC</option>

											</select>
										</div>
										
										<div class="form-group">
											<label for="kilometros"><strong>Kilómetros</strong></label>
											<input type="text" class="form-control" id="kilometros" name="kilometros" required>
										</div>
									</div>

									<div class="col-xs-12 col-lg-6">

										<div class="form-group">
											<label for="chasis_num"><strong>Número de Chasis</strong></label>
											<input type="text" class="form-control" id="chasis_num" name="chasis_num" required>
										</div>

										<div class="form-group">
											<label for="motor_num"><strong>Número de Motor</strong></label>
											<input type="text" class="form-control" id="motor_num" name="motor_num" required>
										</div>
										<div class="form-group">
											<label for="estado"><strong>Estado</strong></label>
											<select id="estado" name="estado" class="form-control form-control-sm" required>
												<option>Disponible</option>
												<option>Stock Playa</option>
												<option>Vendido</option>
												<option>A designar</option>

											</select>
										</div>

									</div>
								</div>

								<div class="success">

									<button type="submit" onclick="realizaProceso($('#estado').val())" class="btn btn-primary">
										Guardar</button>
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
			</script>



			@endsection