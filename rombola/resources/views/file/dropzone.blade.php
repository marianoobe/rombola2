@extends('adminlte::layouts.app')

@section('seccion')
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
									
					
			<form action="{{ route('dropzone') }}" class="dropzone" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="idauto" value={{ $idauto }}>	
			</form>			
					
						<a href="{{ route('usados') }}" class="btn btn-success">VOLVER </a>
						
		</div>
	</div>
</div>
@endsection