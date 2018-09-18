@extends('adminlte::layouts.app')

@section('seccion_index_preventa')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">PreVentas</h3>
					<div class="col-sm-offset-10">
					<a style="margin-bottom:10%;" href="{{ route('pre-venta.create') }}" 
					class="btn btn-success btn-block" role="button">NUEVA PREVENTA</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<!--<div class="row">
							<div class="col-sm-6">
								<div class="dt-buttons btn-group">
									<a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#" title="Excel"><span><i
											    class="fa fa-file-excel-o"></i></span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0"
									    aria-controls="example" href="#" title="PDF"><span><i class="fa fa-file-pdf-o"></i></span></a>
									<a class="btn btn-default buttons-collection buttons-colvis" tabindex="0" aria-controls="example" href="#"
									    title="Ocultar Columnas"><span><i class="fa fa-check-square-o"></i></span></a><a class="btn btn-default buttons-print"
									    tabindex="0" aria-controls="example" href="#" title="Imprimir"><span><i class="fa fa-print"></i></span></a>
								</div>
							</div>
							<div class="col-sm-5">
								<div id="example_filter" class="dataTables_filter">
									<label>Buscar:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label>
								</div>
							</div>
						</div>-->
						<thead>
							<tr>
								<th scope="col">Fecha</th>
								<th scope="col">Auto Buscado</th>
								<th scope="col">Auto Ofrecido</th>
								<th scope="col">Dinero que dispone</th>
								<th scope="col">Formas de Pago</th>
								<th scope="col">Estado</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						</table>
					
					<script>
						function realizaProceso(valorCaja1) {
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
					</script>
					@endsection