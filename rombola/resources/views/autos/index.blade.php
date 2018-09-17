@extends('adminlte::layouts.app')

@section('seccion')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Autos</h3>
					
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">MARCA</th>
								<th scope="col">MODELO</th>
								<th scope="col">VERSION</th>
								<th scope="col">CHASIS</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						@foreach($autos as $item)
							<tr>
								<td>{{$item->id_auto}}</td>
								<td>{{$item->marca}}</td>
								<td>{{$item->modelo}}</td>
								<td>{{$item->version}}</td>
								<td>{{$item->chasis_num}}</td>
								<td style="cursor: default;">
									<button type="button" onclick="irACliente(5);" class="btn btn-info btn-xs">
										<span class="glyphicon glyphicon-search" aria-hidden="true">
										</span>
									</button>
								</td>
							</tr>
							@endforeach()
						</tbody>
					</table>
							
								

								@endsection