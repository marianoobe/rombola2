@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<style>
	.btn-squared-default
		{
			width: 100px !important;
			height: 100px !important;
			font-size: 10px;
		}
	
			.btn-squared-default:hover
			{
				border: 3px solid white;
				font-weight: 800;
			}
	
		.btn-squared-default-plain
		{
			width: 100px !important;
			height: 100px !important;
			font-size: 10px;
		}
	
			.btn-squared-default-plain:hover
			{
				border: 0px solid white;
			}
</style>

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Bienvenidos al Sistema de venta RA Group</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						
					</div>
				</div>
				<div align="center" class="box-body">
					<!--
					<img align="center" id="empresa-logo" src="/img/logogrande.png" width="900" height="400">
				-->
					<div class="container text-xs-center">
						<div class="row">
							<div class="col-lg-12">

								<p>
									<a class="btn btn-squared-default-plain btn-primary" data-toggle="modal" data-target="#modal-clienteNuevo">
										<i class="fa fa-android fa-5x"></i>
										<br />
										Nuevo Cliente
									</a>
									<a data-toggle="modal" data-target="#modal-menu" class="btn btn-squared-default-plain btn-success">
										<i class="fa fa-laptop fa-5x"></i>
										<br />
										Nueva Venta
									</a>
									<a href="#" class="btn btn-squared-default-plain btn-info">
										<i class="fa fa-compass fa-5x"></i>
										<br />
										Ver Listas
									</a>
									<a href="#" class="btn btn-squared-default-plain btn-warning">
										<i class="fa fa-pencil fa-5x"></i>
										<br />
										Ver Autos 0 KM
									</a>
									<a href="#" class="btn btn-squared-default-plain btn-danger">
										<i class="fa fa-car fa-5x"></i>
										<br />
										Ver Autos Usados
									</a>
								</p>
							</div>
						</div>
					</div>
					<img align="center" id="empresa-logo" src="/img/logogrande.png" width="900" height="400">




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
					<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog" aria-labelledby="modal-menu"
					 aria-hidden="true">
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

					@endsection