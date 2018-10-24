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
							<h3 class="box-title">AUTO 0KM</h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>

							</div>
						</div>
						<div class="box-header">


						</div>
						

						<div class="box-body">
							<form method="POST" action="{{ route('cero.store') }}" enctype="multipart/form-data">

								{{ csrf_field() }}
								<input type="hidden" name="_token" value="{{csrf_token()}}">

								<div class="row margenBoot-25">
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">

											<label><strong>*MARCA DE VEHICULO</strong></label>
											<select id="marca" name="marca" class="selectpicker show-tick" data-show-subtext="true" data-live-search="true"
											 data-style="btn-primary" data-placeholder="Seleccione marca vehiculo..." data-width="100%">
												<option value="">Seleccionar marca del vehiculo</option>
												@foreach ($marcas as $item){
												<option value="{{$item->idmarca}}"> {{ $item->nombre }} </option>
												}
												@endforeach

											</select>


										</div>
										<div class="form-group">
											<label for="modelo"><strong>Modelo</strong></label>
											<input type="text" class="form-control" id="modelo" name="modelo" required>
										</div>
										
										<div class="form-group">
											<label for="vin"><strong>Vin</strong></label>
											<input type="text" class="form-control" id="vin" name="vin" required>
										</div>

									</div>
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<label for="version"><strong>Version</strong></label>
											<input type="text" class="form-control" id="version" name="version" required>
										</div>
										<div class="form-group">
											<label for="color"><strong>Color</strong></label>
											<input type="text" class="form-control" id="color" name="color" required>
										</div>




									</div>
								</div>
								
							<div class="success">

									<button type="submit" onclick="realizaProceso($('#marca').val())" class="btn btn-primary">
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