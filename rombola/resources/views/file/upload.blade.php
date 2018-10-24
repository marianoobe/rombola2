@extends('adminlte::layouts.app')

@section('seccion')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-offset-md-4">
			<div class="card">
				<h5 class="card-header">File Upload</h5>
				<div class="card-body">	
					
					<form action="{{ route('uploadfile') }}"  method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<input type="file" name="file[]" multiple>                            
						</div>
						<div>
						<button type="submit" class="btn btn-primary">Upload</button>
						<a href="{{ route('viewfile') }}" class="btn btn-success">Back</a>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection