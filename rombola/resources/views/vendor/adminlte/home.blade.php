@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
{!! Html::style('css/estilo-home.css') !!}

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-body">
					<div class="container-fluid text-xs-center">
						<div class="row">
							<div class="col-lg-1">
							</div>
							<div class="col-lg-9">
								<a class="btn btn-squared-default-plain btn-primary" data-toggle="modal" data-target="#modal-clienteNuevo">
									<i class="fas fa-user-alt  fa-3x"></i>
									<br />
									Nuevo Cliente
								</a>
								<a data-toggle="modal" data-target="#modal-menu" class="btn btn-squared-default-plain btn-primary">
									<i class="far fa-file fa-3x"></i> <br />
									Nueva Venta
								</a>
								<a href="{{url('listaprecios')}}" class="btn btn-squared-default-plain btn-primary">
									<i class="far fa-file-pdf fa-3x"></i>
									<br />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Listas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</a>
								<a href="{{url('cero')}}" class="btn btn-squared-default-plain btn-primary">
									<i class="fa fa-automobile fa-3x"></i>
									<br />
									Autos 0 KM
								</a>
								<a href="{{url('autos/usados')}}" id="" class="btn btn-squared-default-plain btn-primary">
									<i class="fas fa-car-side fa-3x"></i>
									<br />
									Autos Usados
								</a>

								</p>
							</div>
							<div class="col-lg-2">
								<img align="right" id="empresa-logo" src="/img/logogrande.png" width="200" height="90">
							</div>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
	</div>
</div>

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-body">
					<div class="container-fluid spark-screen">
						<div class="row">
							@can('admin')
							<div class="col-md-10 col-md-offset-0">
								<div id="tabla_act" name="tabla_act">
									@include('adminlte::home-table')
								</div>
							</div>
							@endcan

							<div class="col-md-4">
									<div class="box box-primary">
											<div class="box-header with-border">
											  <h3 class="box-title">Lista de Tareas</h3>
											  <div class="box-tools pull-right">
											  </div>
											  <!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
									<div class="box-body">
										<!--
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> </button>
											<h4><i class="icon fa fa-ban"></i>Alerta</h4>
											<h5><span class="label label-success btn">Comunicarse con Mariano Benitez. </span></h5>
										</div>

										<div class="callout callout-success">
											<h4>I am a success callout!</h4>
											<p>This is a green callout.</p>
										</div>

										<div class="alert alert-danger" role="alert">
											This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
										</div>
									-->
										<h4><span class="label label-danger btn">Comunicarse con Mariano Benitez. </span></h4>
										<h4><span class="label label-danger btn">Comunicarse con Mariano Benitez. </span></h4>
										<h4><span class="label label-danger btn">Comunicarse con Mariano Benitez. </span></h4>
										<!-- /.box-body -->
									</div>
									<!-- /.box -->
								</div>
							
								<div class="box box-primary">
										<div class="box-header with-border">
										  <h3 class="box-title">Promociones</h3>
										  <div class="box-tools pull-right">
										  </div>
										  <!-- /.box-tools -->
										</div>
										<!-- /.box-header -->
										<div class="box-body">
										 Chevrolet S10 LB $1400000
										</div>
										<!-- /.box-body -->
									  </div>
							
						
							</div>
							<div class="col-md-8">
									<div class="box box-solid">
											
											<!-- /.box-header -->
											<div class="box-body">
											  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
												<ol class="carousel-indicators">
												  <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
												  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
												  <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
												</ol>
												<div class="carousel-inner">
												  <div class="item">
													<img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
								
													<div class="carousel-caption">
													  First Slide
													</div>
												  </div>
												  <div class="item">
													<img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
								
													<div class="carousel-caption">
													  Second Slide
													</div>
												  </div>
												  <div class="item active">
													<img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
								
													<div class="carousel-caption">
													  Third Slide
													</div>
												  </div>
												</div>
												<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
												  <span class="fa fa-angle-left"></span>
												</a>
												<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
												  <span class="fa fa-angle-right"></span>
												</a>
											  </div>
											</div>
											<!-- /.box-body -->
										  </div>



						    </div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>


	<!--Modal Cliente Fast -->
	<div class="modal fade" id="modal-clienteNuevo" tabindex="-1" role="dialog" aria-labelledby="modal-clienteNuevo"
	 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">×</font>
							</font>
						</span></button>
					<h4 class="modal-title">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">NUEVO CLIENTE</font>
						</font>
					</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('clientefast') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="row margenBoot-25">
							<div class="col-xs-12 col-lg-12">
								<div class="form-group">
									<label><strong>*Nombres</strong></label>
									<input type="text" class="form-control" id="nombre" name="nombre" required>
								</div>
								<div class="form-group">
									<label><strong>*Apellidos</strong></label>
									<input type="text" class="form-control" id="apellido" name="apellido" required>
								</div>
								<div class="form-group">
									<label><strong>*Correo Electrónico</strong></label>
									<input type="email" placeholder="email@gmail.com" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label><strong>*Celular</strong></label>
									<input type="text" class="form-control" id="cel_1" name="cel_1" required>
								</div>
							</div>
						</div><!-- /.modal-dialog -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
				</div>

				</form>
			</div>
		</div>
	</div>

	<!-- Modal Acceso de estado -->
	<!--Modal -->
	<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog" aria-labelledby="modal-menu" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">×</font>
							</font>
						</span></button>
				</div>
				<div class="modal-body">
					<div class="row margenBoot-25">
						<div class="col-xs-12 col-lg-6">
							<a id="boton" href="{{ route('ventacontado.create') }}" class="btn btn-success btn-block">
								<span class="fa fa-money"> CONTADO</span></a>
						</div>
						<div class="col-xs-12 col-lg-6">
							<div class="col-6">
								<a id="boton" href="{{ route('venta.create') }}" class="btn btn-success btn-block">
									<span class="fa fa-university"> FINANCIACION</span></a>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Fin Modal Acceso de estado -->
	<script>
		$(function ($) {
			$("#cel_1").mask("(999) 999-9999");
		});

		$(document).ready(function () {

			setInterval(loadClima, 60000);

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#btn_prueba').click(function (e) {
				e.preventDefault();
				var name = "PEPE";
				$.ajax({
					type: 'POST',
					url: '/prueba',
					data: {
						name: name
					},
					success: function (data) {

						setInterval($('#tabla_act').load('prueba1'), 36000);
					}
				});
			});

		});

		function loadClima() {
			$('#tabla_act').empty().load('prueba1')
		}

		/* $(document).ready(function(){
        setInterval(loadClima,2000);
        });
        
        function loadClima(){
        $("#clima").empty().append("Hola");
        }*/
	</script>
	@endsection