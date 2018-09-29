@extends('adminlte::layouts.app')


@section('seccion')
<script>
	function habilita(){
     if($(".inputText").disabled)
        $(".inputText").removeAttr("disabled");
    }
    </script>
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="box">
				<div class="box-header with-border">


					<!-- Default box -->
					<div class="box-tools pull-right">
						<button type="button" onclick="habilitarEdicion();" class="btn btn-xl btn-success">Modificar</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row margenBoot-25">


						<div class="box-body">
							@foreach($car as $item)
							@endforeach()
							<form method="POST" action="{{ route('autos.update',$item->id_auto) }}" enctype="multipart/form-data">

								{{ csrf_field() }}
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" id="nuevo" name="nuevo" value="nuevo">
								<div class="row margenBoot-25">
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<label for="marca"><strong>Marca</strong></label>
											<input type="text" class="form-control" id="marca" name="marca" value={{ $item->marca }} disabled="disabled">
										</div>
										<div class="form-group">
											<label for="modelo"><strong>Modelo</strong></label>
											<input type="text" class="form-control" id="modelo" name="modelo" value={{ $item->modelo }} disabled="disabled">
										</div>
										<div class="form-group">
											<label for="version"><strong>Version</strong></label>
											<input type="text" class="form-control" id="version" name="version" value={{ $item->version }} disabled="disabled">
										</div>
										<div class="form-group">
											<label for="vin"><strong>Vin</strong></label>
											<input type="text" class="form-control" id="vin" name="vin" value={{ $item->vin }} disabled="disabled">
										</div>

									</div>
									<div class="col-xs-12 col-lg-6">
										<div class="form-group">
											<label for="color"><strong>Color</strong></label>
											<input type="text" class="form-control" id="color" name="color" value={{ $item->color }} disabled="disabled">
										</div>
										<div class="form-group">
											<label for="combustible"><strong>Combustible</strong></label>
											<input type="text" class="form-control" id="combustible" name="combustible" value={{ $item->combustible }}
											 disabled="disabled">
										</div>
									</div>
									<div class="col-xs-12 col-lg-6">

										<div class="form-group">
											<label for="chasis_num"><strong>Numero de Chasis</strong></label>
											<input type="text" class="form-control" id="chasis_num" name="chasis_num" value={{ $item->chasis_num }}
											 disabled="disabled">
										</div>

										<div class="form-group">
											<label for="motor_num"><strong>Numero de Motor</strong></label>
											<input type="text" class="form-control" id="motor_num" name="motor_num" value={{ $item->motor_num }}
											 disabled="disabled">
										</div>
										<div class="form-group">
											<label for="estado"><strong>Estado</strong></label>
											<input type="text" id="estado" name="estado" class="form-control form-control-sm" value={{ $item->estado }}
											 disabled="disabled">

											</input>
										</div>

									</div>
								</div>

								<div class="box-footer">
									<div class="row margenBoot-25" style="margin-top:25px;">
										<div id="actualizar" class="col-xs-12 col-lg-12" style="display:none">
											<button type="submit" class="btn btn-primary">Actualizar Información</button>
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

				function habilitarEdicion() {
					document.getElementById("actualizar").style.display = "block";
					document.getElementById("actualizar").style.textAlign = "center";
					$('input').prop('disabled', false);
					$('select').prop('disabled', false);
					$('#chk-condominio').bootstrapSwitch('toggleDisabled');
					$('[type="button"]').removeClass('disabled');

				}
			</script>



			@endsection