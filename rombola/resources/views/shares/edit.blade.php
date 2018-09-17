@extends('adminlte::layouts.app')

@section('seccionedit')
<script>
function habilita(){
     if($(".inputText").disabled)
        $(".inputText").removeAttr("disabled");
    }
    </script>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-14 col-md-offset-0">
      @foreach($client as $item)
      @endforeach()
      <button onclick="habilita"  class="btn btn-primary">Editar</button>
      <form method="POST" action="{{ route('clientes.update',$item->idpersona) }}">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="dni">Dni:</label>
          <input id="dni" type="text" class="form-control" name="dni" value={{ $item->dni }} disabled="disabled" onclick="deshabilita() />
        </div>
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="nombre" value={{ $item->nombre }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="price">Apellido:</label>
          <input type="text" class="form-control" name="apellido" value={{ $item->apellido }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Email:</label>
          <input type="text" class="form-control" name="email" value={{ $item->email }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Domicilio:</label>
          <input type="text" class="form-control" name="domicilio" value={{ $item->domicilio }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Actividad/Empresa:</label>
          <input type="text" class="form-control" name="act_empresa" value={{ $item->act_empresa }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Teléfono Fijo:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Celular 1:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Celular 2:</label>
          <input type="text" class="form-control" name="num_tel" value={{ $item->num_tel }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Fecha de Nacimiento:</label>
          <input type="text" class="form-control" name="fecha_nacimiento" value={{ $item->fecha_nacimiento }} disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="quantity">Estado Civil:</label>
          <input type="text" class="form-control" name="estado_civil" value={{ $item->estado_civil }} disabled="disabled" />
          <select id="estado_civil" name="estado_civil" class="form-control form-control-sm">
            <option value:"Soltero">Soltero</option>
            <option value:"Convive">Convive</option>
            <option value:"Casado">Casado</option>
            <option value:"Divorciado">Divorciado</option>
            <option value:"Viudo">Viudo</option>
          </select>
        </div>
        <button type="submit" onclick="realizaProceso($('#estado_civil').val())" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
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
/*
  function onoff(dni,nombre,apellido,email,act_empresa,fecha_nacimiento,domicilio,estado_civil,num_tel) 
  {
    var estadodni = dni;
    document.write(estadodni);
    var estadonombre = document.getElementById(nombre);
    var estadoapellido = document.getElementById(apellido);
    var estadoemail = document.getElementById(email);
    var estadoact_empresa = document.getElementById(act_empresa);
    var estadofecha_nacimiento = document.getElementById(fecha_nacimiento);
    var estadodomicilio = document.getElementById(domicilio);
    var estadoestado_civil = document.getElementById(estado_civil);
    var estadonum_tel = document.getElementById(num_tel);

    if (estadodni.disabled) {
      estadodni.disabled = false;
      estadonombre.disable = false;
      estadoapellido.disable = false;
      estadoemail.disable = false;
      estadoact_empresa.disable = false;
      estadofecha_nacimiento.disable = false;
      estadodomicilio.disable = false;
      estadoestado_civil.disable = false;
      estadonum_tel.disable = false;
    } else {
      estadodni.disabled = true;
      estadonombre.disable = true;
      estadoapellido.disable = true;
      estadoemail.disable = true;
      estadoact_empresa.disable = true;
      estadofecha_nacimiento.disable = true;
      estadodomicilio.disable = true;
      estadoestado_civil.disable = true;
      estadonum_tel.disable = true;
    }
  }
*/
  jQuery("#activar").click(function() {
  jQuery('.form-group').removeAttr("disabled") // Remueve el disabled de todos los elementos con clase form
  jQuery('.form-group').focus() // ¿En cuál de todos los elementos con clase form hace el focus?
});

function habilita(){
     if($(".inputText").disabled)
        $(".inputText").removeAttr("disabled");
    }
 
    function deshabilita(){
        $(".inputText").attr("disabled","disabled");
    }

</script>
@show