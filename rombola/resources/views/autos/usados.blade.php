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
							<h3 class="box-title">AUTOS USADOS</h3>

							<div class="box-tools pull-right">

								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>

							</div>
						</div>
						<div class="box-header">


						</div>

						<div class="box-body">
							<div class="col-sm-4 pull-left">
								<a class="btn btn-primary" a href="{{ route('agregarusado')}}">
									AGREGAR USADO</a>

							</div>
							<form method="GET" action="{{ route('usados') }}" class="navbar-form pull-right" role="search">
								{{ csrf_field() }}
								<div class="input-group">
									<input type="hidden" id="usado" name="usado" value="2">
									<input type="text" class="form-control" name="name" placeholder="Busqueda">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</span>
								</div>
							</form>
						</div>

						    <div class="table-responsive">

							<table class="table table-striped">

								<thead>
									<tr>

										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" : activate to sort column ascending"
										 style="width: 58px;" />

										<th scope="col">MARCA</th>
										<th scope="col">MODELO</th>
										<th scope="col">DESCRIPCION</th>
										<th scope="col">DOMINIO</th>
										<th scope="col"></th>
										

									</tr>
								</thead>
								<tbody>



									@foreach($autos as $item)

									<input type="hidden" name="idauto" value="{{ $item->id_auto }}">
									<tr>
										<td align="center" style="cursor: default;">
											<img src={{url("img/marcas/$item->nombre.jpg")}} alt="..." class="img-circle" style="width: 50px; height: 50px;" />
										</td>

										<td>{{$item->nombre}}</td>
										<td>{{$item->modelo}}</td>
										<td>{{$item->version}}</td>
										<td>{{$item->dominio}}</td>



										<td style="cursor: default;">
											<a href="{{ route('editusado',$item->id_auto)}}" class="edit-modal btn btn-info btn-sm">
												<span class="glyphicon glyphicon-edit" data-original-title="Editar auto" tooltip-glyph="glyph-tooltip-demo"></span></a>

											<a href="{{ route('galeria',$item->id_auto)}}" class="btn btn-danger btn-sm">
											 <span class="glyphicon glyphicon-picture" data-original-title="Galeria de imagenes" tooltip-glyph="glyph-tooltip-demo"></span></a>
											
											
									
										<!--	<a href="{{ route('formfile',$item->id_auto)}}" class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-camera"></span> Camera
											</a> !-->
										</td>

										</td>
									</tr>
									@endforeach()
								</tbody>
							</table>
						    </div>
							<!-- Modal form to show a post -->

							<!--Modal 
							<div class="modal fade" id="modal-listaNuevo" tabindex="-1" role="dialog" aria-labelledby="modal-listaNuevo"
							 aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">×</font>
													</font>
												</span></button>
											<h4 class="modal-title">
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">FOTOS</font>

												</font>
											</h4>
										</div>
										<div class="modal-body">
											<form method="POST" action="" enctype="multipart/form-data">

												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<div class="box-body">
													<div class="row">

														@foreach($files as $file)
														<div class="col-md-4">
															<div class="card">
																<a href={{ url("$file->path")}} data-lightbox="roadtrip" data-title="My caption">
																	<img class="card-img-top" src={{ url("$file->path")}} style="width: 120px; height: 120px;">
																	<div class="card-body">
																		<strong class="card-title">{{ $file->title }}</strong>
																		<p class="card-text">{{ $file->created_at->diffForHumans() }}</p>
																		<form action="{{ route('deletefile', $file->id) }}" method="post">
																			<input type="hidden" name="_token" value="{{csrf_token()}}">
																			<input type="hidden" name="_method" value="DELETE">



																		</form>
																	</div>
															</div>
														</div>
														@endforeach
													</div>

												</div>


										</div>
										</form>
									</div>-->
								</div>
							</div>



							@endsection