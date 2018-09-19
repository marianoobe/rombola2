@extends('adminlte::layouts.app')

@section('seccion')

<section class="content" id="contenedor-ajax" style="display: block;">


	<!--
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-switch.css" rel="stylesheet">
		-->
	<meta charset="utf-8">
	<style type="text/css">
		.tag {
			font-size: 14px;
			padding: .3em .4em .4em;
			margin: 3px;
			display: inline-block;
		}

		.tag a {
			color: #bbb;
			cursor: pointer;
			opacity: 0.6;
		}

		.tag a:hover {
			opacity: 1.0
		}

		.tag .remove {
			vertical-align: bottom;
			top: 2px;
		}

		.tag a {
			margin: 0 0 0 .3em;
		}

		.tag a .glyphicon-white {
			color: #fff;
			margin-bottom: 2px;
		}

		input {
			text-transform: uppercase;
		}

		textarea {
			text-transform: uppercase;
		}

		@media (min-width: 768px) {
			.alturaPrimerImagenGalery {
				height: 250px;
			}
		}
	</style>


	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cliente</h3>

					<div class="box-tools pull-right">
						<button type="button" onclick="habilitarEdicion();" class="btn btn-xl btn-success">Modificar</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row margenBoot-25">
						@foreach($client as $item)
						@endforeach()
						<form method="POST" action="{{ route('clientes.update',$item->idpersona) }}">
							<div class="col-xs-16 col-lg-6">

								<div class="form-group">
									<label>Dni:</label>
									<input id="dni" type="text" class="form-control" name="dni" value={{ $item->dni }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" class="form-control" name="nombre" value={{ $item->nombre }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" class="form-control" name="apellido" value={{ $item->apellido }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="text" class="form-control" name="email" value={{ $item->email }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="domicilio">Domicilio:</label>
									<input type="text" class="form-control" name="domicilio" value={{ $item->email }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="quantity">Actividad/Empresa:</label>
									<input type="text" class="form-control" name="act_empresa" value={{ $item->act_empresa }} disabled="disabled" />
								</div>

							</div>
							<div class="col-xs-16 col-lg-6">
								<div class="form-group">
									<label for="quantity">Teléfono Fijo:</label>
									<input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="quantity">Celular 1:</label>
									<input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="quantity">Celular 2:</label>
									<input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="quantity">Fecha de Nacimiento:</label>
									<input type="text" class="form-control" name="fecha_nacimiento" value={{ $item->fecha_nacimiento }} disabled="disabled" />
								</div>
								<div class="form-group">
									<label for="estado_civil">Estado Civil:</label>
									<input type="text" class="form-control" name="estado_civil" value={{ $item->estado_civil }} disabled="disabled" />
								</div>
							</div>
						</form>
						<!-- /.row -->
					</div>
					<!-- ./box-body -->
					<div class="box-footer">
							<div class="row margenBoot-25" style="margin-top:25px;">
									<div id="actualizar" class="col-xs-12 col-lg-12"  style="display:none">
											<button type="submit" class="btn btn-primary">Actualizar Información</button>
										</div>
								</div>	
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
</section>

<script>
		function realizaProceso(valorCaja1) {
      this.style.display='none';
		  var parametros = {
			"valorCaja1": valorCaja1
		  };
		  $.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'clientes.store', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function () {
			  $("#resultado").html("Procesando, espere por favor...");
			},
			success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			  $("#resultado").html(response);
			}
		  });
		}

		function habilitarEdicion(){
      document.getElementById("actualizar").style.display = "block";
      document.getElementById("actualizar").style.textAlign = "center";
			$('input').prop('disabled', false);
			$('select').prop('disabled', false);
			$('#chk-condominio').bootstrapSwitch('toggleDisabled');
      $('[type="button"]').removeClass('disabled');  
       
    }
    
	  </script>

@endsection