@extends('adminlte::layouts.app')

@section('seccion')
@foreach($client as $item)
@endforeach()

@if (count($auto_comprado) == 0)

@php
$item_venta_auto = null;
@endphp

@else

@foreach ($auto_comprado as $item_venta_auto)
@endforeach()
@endif

<form method="post" action="{{ route('clientes.update',$item->idpersona) }}">
	<input name="_method" type="hidden" value="PATCH">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
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
						<div class="col-xs-16 col-lg-6">
							<div class="form-group">
								<label>Dni:</label>
								<input id="dni" type="number" class="form-control" name="dni" value="{{ $item->dni }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Nombres:</label>
								<input type="text" class="form-control" name="nombre" value="{{ $item->nombre }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Apellidos:</label>
								<input type="text" class="form-control" name="apellido" value="{{ $item->apellido }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="text" class="form-control" name="email" value="{{ $item->email }}" disabled="disabled" />
							</div>

							<div class="form-group">
								<label>Domicilio:</label>
								<input type="text" class="form-control" name="domicilio" value="{{ $item->domicilio }}" disabled="disabled" />
							</div>

						</div>
						<div class="col-xs-16 col-lg-6">
							<div class="form-group">
								<label>Actividad/Empresa:</label>
								<input type="text" class="form-control" name="act_empresa" value="{{ $item->act_empresa }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Celular:</label>
								<input type="text" class="form-control" name="num_tel" value="{{ $item->num_tel }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Otro:</label>
								<input type="text" class="form-control" name="num_tel" value="{{ $item->num_tel }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Fecha de Nacimiento:</label>
								<input type="date" class="form-control" name="fecha_nacimiento" value="{{ $item->fecha_nacimiento }}" disabled="disabled" />
							</div>
							<div class="form-group">
								<label>Estado Civil:</label>
								<select id="estado_civil" name="estado_civil" class="form-control form-control-sm" disabled="disabled">
								</select>
							</div>

						</div>

						<!-- /.row -->
					</div>

</form>
<!-- ./box-body -->
<div class="box-footer">
	<div class="row margenBoot-25" style="margin-top:25px;">
		<div id="actualizar" class="col-xs-12 col-lg-12" style="display:none">
			<button type="submit" class="btn btn-primary">Guardar Cambios</button>
		</div>
	</div>
</div>

<!-- /.box-footer -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>



<div class="col-sm-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Historial</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row margenBoot-25">
					<div class="col-xs-16 col-lg-6">
						<h4>Consultas</h4>
						@if ($item_venta_auto != null)
						<div class="form-group">
								<li><label>En la fecha <strong>{{$item_venta_auto->fecha}}</strong> se interesó por el auto: <strong>{{$item_venta_auto->interes}}</strong></label></li>	
						</div>
							
						@else
						<div class="form-group">
								<li><label>No se registran consultas</label></li>	
						</div>
						@endif

					</div>
					<div class="col-xs-16 col-lg-6">
							<h4>Compras</h4>
							@if ($item_venta_auto != null)
							<div class="form-group">
									<li><label>En la fecha <strong>{{$item_venta_auto->fecha}}</strong> adquirió el auto <strong>{{$item_venta_auto->nombre}}</strong> <strong>{{$item_venta_auto->modelo}}</strong></label></li>										
								</div>
							@else
							<div class="form-group">
									<li><label>No se registran compras</label></li>										
								</div>
							@endif
						
					</div>

					<!-- /.row -->
				</div>

</form>
<!-- ./box-body -->
<div class="box-footer">
<div class="row margenBoot-25" style="margin-top:25px;">
	<div id="actualizar" class="col-xs-12 col-lg-12" style="display:none">
		<button type="submit" class="btn btn-primary">Guardar Cambios</button>
	</div>
</div>
</div>

<!-- /.box-footer -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>

</div>

<script>
	$(document).ready(function () {

		var array = ["Soltero", "Convive", "Casado", "Divorciado", "Viudo"];

		var select = document.getElementsByName(estado_civil)[0];

		for (value in array) {
			var option = document.createElement("option");
			console.log(option);
			option.text = array[value];
			$(option).appendTo("#estado_civil");

			var estadocivil = document.getElementById("inputestado").value;
			$("#estado_civil").val(estadocivil);
		}

	});

	function realizaProceso(valorCaja1) {
		this.style.display = 'none';
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

	function habilitarEdicion() {
		document.getElementById("actualizar").style.display = "block";
		document.getElementById("actualizar").style.textAlign = "center";
		$('input').prop('disabled', false);
		$('input').prop('required', true);
		$('select').prop('disabled', false);

	}
</script>

@endsection