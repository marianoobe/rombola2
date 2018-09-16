
<form method="POST" action="{{ route('clientes.store') }}">
    <div class="form-group">
<input type="hidden" name="_token" value="{{csrf_token()}}">
        <label for="idpersona">idpersona: </label>
        <input type="text" class="form-control" name="idpersona" />
    </div>
    <div class="form-group">
        <label for="domicilio">domicilio :</label>
        <input type="text" class="form-control" name="domicilio" />
    </div>
    <div class="form-group">
        <label for="estado_civil">Estado Civil:</label>
        <input type="text" class="form-control" name="estado_civil" />
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

