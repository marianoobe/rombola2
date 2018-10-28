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
							<h3 class="box-title">AUTOS 0KM - STOCK/DEPOSITO</h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>
								
							</div>
						</div>
						<div class="box-header">


						</div>

						<div class="box-body">

							<form method="GET" action="{{ route('autos.index') }}" class="navbar-form pull-right" role="search">
								
								<div class="input-group">
									
								<input type="hidden" name="_token" value="{{csrf_token()}}">
	                        
									<input type="text" class="form-control" name="name" placeholder="Busqueda">
									<input type="hidden" id="dato" name="dato" value="nuevo">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</span>
								</div>
							</form>
						</div>

						<div>

							<table class="table table-striped">

								<thead>
									<tr>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" : activate to sort column ascending"
										 style="width: 58px;"/>
										
										<th scope="col">MARCA</th>
										<th scope="col">MODELO</th>
										<th scope="col">VERSION</th>
										<th scope="col">COLOR</th>
										
										<th scope="col">EDITAR</th>

									</tr>
								</thead>
								<tbody>
									@foreach($autos as $item)
									<tr>
										<td align="center" style="cursor: default;">
											<img src={{url("img/marcas/$item->nombre.jpg")}} alt="..." class="img-circle" style="width: 80px; height: 80px;" />
										</td>
										
										<td >{{$item->nombre}}</td>
										<td>{{$item->modelo}}</td>
										<td>{{$item->descripcion}}</td>
										<td>{{$item->color}}</td>
										
										<td style="cursor: default;">
											<a href="{{ route('cero.edit',$item->id_autocero)}}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-search"></span></a>

										</td>



										</td>
									</tr>
									@endforeach()
								</tbody>
							</table>
          
							{{ $autos->render() }}

							@endsection