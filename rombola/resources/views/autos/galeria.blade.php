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
							<h3 class="box-title">GALERIA DE IMAGENES</h3>

							<div class="box-tools pull-right">
								<a class="btn btn-xs btn-success" onclick="history.back(1);">
									<i class="fa fa-chevron-left"></i> VOLVER</a>

							</div>
						</div>
						<div class="box-header">


						</div>
						@foreach($auto as $item)
						@endforeach()
						<div class="box-body">
							<div class="col-sm-4 pull-left">
								<a href="{{ route('formfile',$item->id_auto)}}" class="btn btn-info btn-sm">
									<span class="glyphicon glyphicon-camera"></span> AGREGAR IMAGEN
								</a>


							</div>
						</div>


						<!-- Modal form to show a post -->


						
						<div class="modal-body">
											<form method="POST" action="" enctype="multipart/form-data">

												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<div class="box-body">
													

														@foreach($files as $file)
														
															
																<a href={{ url("$file->path")}} data-lightbox="roadtrip" data-title="My caption">
																	<img class="card-img-top" src={{ url("$file->path")}} style="width: 120px; height: 120px;">
																	
															
														
														@endforeach
													

												</div>


										</div>
										</form>
									</div>



@endsection

<script type="text/javascript">
	$(document).ready(function () {
		$('.zoom').lightBox({
			overlayBgColor: '#FFF',
			overlayOpacity: 0.8,
			containerResizeSpeed: 350,
			txtImage: 'Imagen',
			txtOf: 'de'
		});
	});
</script>