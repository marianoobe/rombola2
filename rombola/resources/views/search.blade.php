{!! Form::open(array( 'url'=>'','method'=>'GET','autocomplete'=>'off','role'=>'search' ))}

<div class="form-group">
  <div class="input-group">
  <input class="form-control" name="search" placeholder=""> 
  <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</div>

{{Form::close()}}