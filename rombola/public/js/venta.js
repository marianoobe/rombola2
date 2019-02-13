function validar_check_conyuge(obj) {
  if (obj.checked == true) {
    document.getElementById("conyuge").style.display = "block";
    document.getElementById("conyuge_dni").required = true;
    document.getElementById("conyuge_nombre").required = true;
    document.getElementById("conyuge_apellido").required = true;
    document.getElementById("conyuge_fecha_nac").required = true;
    document.getElementById("conyuge_cel_1").required = true;
    document.getElementById("conyuge_domicilio").required = true;
    document.getElementById("conyuge_act_empresa").required = true;
    document.getElementById("input_conyuge").value = "si";
  } else {
    document.getElementById("conyuge").style.display = "none";
    $('#conyuge_dni').removeAttr("required");
    $('#conyuge_nombre').removeAttr("required");
    $('#conyuge_apellido').removeAttr("required");
    $('#conyuge_fecha_nac').removeAttr("required");
    $('#conyuge_cel_1').removeAttr("required");
    $('#conyuge_domicilio').removeAttr("required");
    $('#conyuge_act_empresa').removeAttr("required");
    document.getElementById("input_conyuge").value = "no";
  }
}

function validar_check_conyuge_financ(obj) {
  if (obj.checked == true) {
    document.getElementById("conyuge").style.display = "block";
    document.getElementById("conyuge_dni").required = true;
    document.getElementById("conyuge_nombre").required = true;
    document.getElementById("conyuge_apellido").required = true;
    document.getElementById("conyuge_fecha_nac").required = true;
    document.getElementById("conyuge_cel_1").required = true;
    document.getElementById("conyuge_domicilio").required = true;
    document.getElementById("conyuge_act_empresa").required = true;

    document.getElementById("conyuge_profesion").required = true;
    document.getElementById("conyuge_telefono_trabajo").required = true;
    document.getElementById("conyuge_domicilio_empleo").required = true;
    document.getElementById("conyuge_antiguedad").required = true;
    document.getElementById("conyuge_ingresos_mensuales").required = true;
    document.getElementById("conyuge_nombre_padre").required = true;
    document.getElementById("conyuge_nombre_madre").required = true;
    document.getElementById("input_conyuge").value = "si";
  } else {
    document.getElementById("conyuge").style.display = "none";
    $('#conyuge_dni').removeAttr("required");
    $('#conyuge_nombre').removeAttr("required");
    $('#conyuge_apellido').removeAttr("required");
    $('#conyuge_fecha_nac').removeAttr("required");
    $('#conyuge_cel_1').removeAttr("required");
    $('#conyuge_domicilio').removeAttr("required");
    $('#conyuge_act_empresa').removeAttr("required");

    $('#conyuge_profesion').removeAttr("required");
    $('#conyuge_telefono_trabajo').removeAttr("required");
    $('#conyuge_domicilio_empleo').removeAttr("required");
    $('#conyuge_antiguedad').removeAttr("required");
    $('#conyuge_ingresos_mensuales').removeAttr("required");
    $('#conyuge_nombre_padre').removeAttr("required");
    $('#conyuge_nombre_madre').removeAttr("required");
    document.getElementById("input_conyuge").value = "no";
  }
}

function validar_dependencia(obj) {
  if (obj.checked == true) {
    document.getElementById("check_dependencia").value = 1;
  } else {
    document.getElementById("check_dependencia").value = 0;
  }
}

function validar_check_garante(obj) {
  if (obj.checked == true) {
    document.getElementById("garante").style.display = "block";
    document.getElementById("garante_dni").required = true;
    document.getElementById("garante_nombre").required = true;
    document.getElementById("garante_apellido").required = true;
    document.getElementById("garante_fecha_nac").required = true;
    document.getElementById("garante_cel_1").required = true;
    document.getElementById("garante_domicilio").required = true;
    document.getElementById("garante_act_empresa").required = true;
    document.getElementById("input_garante").value = "si";
  } else {
    document.getElementById("garante").style.display = "none";
    $('#garante_dni').removeAttr("required");
    $('#garante_nombre').removeAttr("required");
    $('#garante_apellido').removeAttr("required");
    $('#garante_fecha_nac').removeAttr("required");
    $('#garante_cel_1').removeAttr("required");
    $('#garante_domicilio').removeAttr("required");
    $('#garante_act_empresa').removeAttr("required");
    document.getElementById("input_garante").value = "no";
  }
}


function enable_buscar() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "none") {
    document.getElementById("buscar").style.display = "block";
    document.getElementById("cancer").value = "buscar";
    document.getElementById("dnis").required = true;
    $('#nuevo_dni').removeAttr("required");
    $('#nuevo_nombre').removeAttr("required");
    $('#nuevo_apellido').removeAttr("required");
    $('#nuevo_fecha_nac').removeAttr("required");
    $('#nuevo_estado_civil').removeAttr("required");
    $('#nuevo_email').removeAttr("required");
    $('#nuevo_cel_1').removeAttr("required");
    $('#nuevo_domicilio').removeAttr("required");
    $('#nuevo_act_empresa').removeAttr("required");

    $('#nuevo_profesion').removeAttr("required");
    $('#telefono_laboral').removeAttr("required");
    $('#nuevo_domicilio_empleo').removeAttr("required");
    $('#nuevo_antiguedad').removeAttr("required");
    $('#nuevo_ingresos_mesuales').removeAttr("required");
    $('#nuevo_nombre_padre').removeAttr("required");
    $('#nuevo_nombre_madre').removeAttr("required");
    $('#nuevo_otros_ingresos').removeAttr("required");

    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");


  } else {
    if (document.getElementById("buscar").style.display == "block") {
      document.getElementById("buscar").style.display = "none";
      $('#dnis').removeAttr("required");
      $("#alert_incompleta").css("display", "none");
      $("#alert_completa").css("display", "none");
      $("#panel_financ").css("display", "none");


    }
  }

  if (document.getElementById("buscar").style.display == "none" && document.getElementById("nuevo").style.display == "block") {
    document.getElementById("buscar").style.display = "block";
    document.getElementById("nuevo").style.display = "none";
    document.getElementById("dnis").required = true;
    $('#nuevo_dni').removeAttr("required");
    $('#nuevo_nombre').removeAttr("required");
    $('#nuevo_apellido').removeAttr("required");
    $('#nuevo_fecha_nac').removeAttr("required");
    $('#nuevo_estado_civil').removeAttr("required");
    $('#nuevo_email').removeAttr("required");
    $('#nuevo_cel_1').removeAttr("required");
    $('#nuevo_domicilio').removeAttr("required");
    $('#nuevo_act_empresa').removeAttr("required");

    $('#nuevo_profesion').removeAttr("required");
    $('#telefono_laboral').removeAttr("required");
    $('#nuevo_domicilio_empleo').removeAttr("required");
    $('#nuevo_antiguedad').removeAttr("required");
    $('#nuevo_ingresos_mesuales').removeAttr("required");
    $('#nuevo_nombre_padre').removeAttr("required");
    $('#nuevo_nombre_madre').removeAttr("required");
    $('#nuevo_otros_ingresos').removeAttr("required");
    document.getElementById("cancer").value = "buscar";
    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");


  }
}

function enable_nuevo() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "none") {
    document.getElementById("nuevo").style.display = "block";
    document.getElementById("cancer").value = "nuevo";

    document.getElementById("nuevo_dni").required = true;
    document.getElementById("nuevo_nombre").required = true;
    document.getElementById("nuevo_apellido").required = true;
    document.getElementById("nuevo_fecha_nac").required = true;
    document.getElementById("nuevo_estado_civil").required = true;
    document.getElementById("nuevo_email").required = true;
    document.getElementById("nuevo_cel_1").required = true;
    document.getElementById("nuevo_domicilio").required = true;
    document.getElementById("nuevo_act_empresa").required = true;
    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");

    $('#dnis').removeAttr("required");


  } else {
    if (document.getElementById("nuevo").style.display == "block") {
      document.getElementById("nuevo").style.display = "none";
      $('#nuevo_dni').removeAttr("required");
      $('#nuevo_nombre').removeAttr("required");
      $('#nuevo_apellido').removeAttr("required");
      $('#nuevo_fecha_nac').removeAttr("required");
      $('#nuevo_estado_civil').removeAttr("required");
      $('#nuevo_email').removeAttr("required");
      $('#nuevo_cel_1').removeAttr("required");
      $('#nuevo_domicilio').removeAttr("required");
      $('#nuevo_act_empresa').removeAttr("required");
      $("#alert_incompleta").css("display", "none");
      $("#alert_completa").css("display", "none");
      $("#panel_financ").css("display", "none");

      document.getElementById("dnis").required = true;
    }
  }

  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "block") {
    document.getElementById("nuevo").style.display = "block";
    document.getElementById("buscar").style.display = "none";

    document.getElementById("nuevo_dni").required = true;
    document.getElementById("nuevo_nombre").required = true;
    document.getElementById("nuevo_apellido").required = true;
    document.getElementById("nuevo_fecha_nac").required = true;
    document.getElementById("nuevo_estado_civil").required = true;
    document.getElementById("nuevo_email").required = true;
    document.getElementById("nuevo_cel_1").required = true;
    document.getElementById("nuevo_domicilio").required = true;
    document.getElementById("nuevo_act_empresa").required = true;
    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");

  }
}

function enable_nuevo_financ() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "none") {
    document.getElementById("nuevo").style.display = "block";
    document.getElementById("cancer").value = "nuevo";

    document.getElementById("nuevo_dni").required = true;
    document.getElementById("nuevo_nombre").required = true;
    document.getElementById("nuevo_apellido").required = true;
    document.getElementById("nuevo_fecha_nac").required = true;
    document.getElementById("nuevo_estado_civil").required = true;
    document.getElementById("nuevo_email").required = true;
    document.getElementById("nuevo_cel_1").required = true;
    document.getElementById("nuevo_domicilio").required = true;
    document.getElementById("nuevo_act_empresa").required = true;

    document.getElementById("nuevo_profesion").required = true;
    document.getElementById("telefono_laboral").required = true;
    document.getElementById("nuevo_domicilio_empleo").required = true;
    document.getElementById("nuevo_antiguedad").required = true;
    document.getElementById("nuevo_ingresos_mesuales").required = true;
    document.getElementById("nuevo_nombre_padre").required = true;
    document.getElementById("nuevo_nombre_madre").required = true;
    document.getElementById("nuevo_otros_ingresos").required = true;


    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");

    $('#dnis').removeAttr("required");


  } else {
    if (document.getElementById("nuevo").style.display == "block") {
      document.getElementById("nuevo").style.display = "none";
      $('#nuevo_dni').removeAttr("required");
      $('#nuevo_nombre').removeAttr("required");
      $('#nuevo_apellido').removeAttr("required");
      $('#nuevo_fecha_nac').removeAttr("required");
      $('#nuevo_estado_civil').removeAttr("required");
      $('#nuevo_email').removeAttr("required");
      $('#nuevo_cel_1').removeAttr("required");
      $('#nuevo_domicilio').removeAttr("required");
      $('#nuevo_act_empresa').removeAttr("required");

      $('#nuevo_profesion').removeAttr("required");
      $('#telefono_laboral').removeAttr("required");
      $('#nuevo_domicilio_empleo').removeAttr("required");
      $('#nuevo_antiguedad').removeAttr("required");
      $('#nuevo_ingresos_mesuales').removeAttr("required");
      $('#nuevo_nombre_padre').removeAttr("required");
      $('#nuevo_nombre_madre').removeAttr("required");
      $('#nuevo_otros_ingresos').removeAttr("required");


      $("#alert_incompleta").css("display", "none");
      $("#alert_completa").css("display", "none");
      $("#panel_financ").css("display", "none");

      document.getElementById("dnis").required = true;
    }
  }

  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "block") {
    document.getElementById("nuevo").style.display = "block";
    document.getElementById("buscar").style.display = "none";

    document.getElementById("nuevo_dni").required = true;
    document.getElementById("nuevo_nombre").required = true;
    document.getElementById("nuevo_apellido").required = true;
    document.getElementById("nuevo_fecha_nac").required = true;
    document.getElementById("nuevo_estado_civil").required = true;
    document.getElementById("nuevo_email").required = true;
    document.getElementById("nuevo_cel_1").required = true;
    document.getElementById("nuevo_domicilio").required = true;
    document.getElementById("nuevo_act_empresa").required = true;

    document.getElementById("nuevo_profesion").required = true;
    document.getElementById("telefono_laboral").required = true;
    document.getElementById("nuevo_domicilio_empleo").required = true;
    document.getElementById("nuevo_antiguedad").required = true;
    document.getElementById("nuevo_ingresos_mesuales").required = true;
    document.getElementById("nuevo_nombre_padre").required = true;
    document.getElementById("nuevo_nombre_madre").required = true;
    document.getElementById("nuevo_otros_ingresos").required = true;

    $("#alert_incompleta").css("display", "none");
    $("#alert_completa").css("display", "none");
    $("#panel_financ").css("display", "none");

  }
}

function enable_usado() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar_usados").style.display == "none") {
    document.getElementById("buscar_usados").style.display = "block";
    document.getElementById("check_usado").value = "si";
    $('#select_marcas').required = true;
  } else {
    if (document.getElementById("buscar_usados").style.display == "block") {
      document.getElementById("buscar_usados").style.display = "none";
      $('#select_marcas').required = false;
      document.getElementById("check_usado").value = "no";

    }
  }
  if (document.getElementById("buscar_usados").style.display == "none" && document.getElementById("nuevo").style.display == "block") {
    document.getElementById("buscar_usados").style.display = "block";
    document.getElementById("nuevo").style.display = "none";
    $('#select_marcas').required = true;
    document.getElementById("check_usado").value = "si";
  }
  console.log(document.getElementById("check_usado").value);
}

function enable_0km() {
  if (document.getElementById("buscar_usados").style.display == "block") {
    document.getElementById("buscar_usados").style.display = "none";
    $('#select_marcas').required = false;

  }
}

function obtenervalue() {
  var res = document.getElementById("buscar_usados").value;
  console.log(res);
  document.getElementById("modelousado").value = res;

}

function obtener_cliente_buscado() {
  var res = document.getElementById("dnis").value;

  document.getElementById("nya_cliente").value = res;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //e.preventDefault();
  var name = res;
  $.ajax({
    type: 'PUT',
    url: '/estado',
    data: {
      name: name
    },
    success: function (data) {
      var valor = JSON.parse(data);
      $("#cargando").css("display", "none");
      var salida = valor[0].estado_ficha;


      if (salida == "Completa") {
        if (document.getElementById('alert_incompleta').style.display == "block") {
          $("#alert_incompleta").css("display", "none");
        }
        $("#alert_completa").css("display", "block");
        $('#salida').text("Ficha ".concat(salida));
      } else {
        if (document.getElementById('alert_completa').style.display == "block") {
          $("#alert_completa").css("display", "none");
        }
        $("#alert_incompleta").css("display", "block");
        $('#salida_danger').text("Ficha ".concat(salida));
      }

      console.log(salida);
    }
  });

}

function modal_edit() {

  var res = document.getElementById("dnis").value;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var name = res;
  $.ajax({
    type: 'PUT',
    url: '/modales',
    data: {
      name: name
    },
    success: function (data) {
      var valor = JSON.parse(data);
      document.getElementById('dni').value = (valor[0].dni);
      document.getElementById('nombre').value = (valor[0].nombre);
      document.getElementById('apellido').value = (valor[0].apellido);
      document.getElementById('cel_1').value = (valor[0].num_tel);
      document.getElementById('email').value = (valor[0].email);
      console.log(valor);
    }
  });

}

function update_modal() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#cargando").css("display", "inline");

  var dni = document.getElementById("dni").value;
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var email = document.getElementById("email").value;
  var cel_1 = document.getElementById("cel_1").value;
  var act_empresa = document.getElementById("act_empresa").value;
  var fecha_nac = document.getElementById("fecha_nac").value;
  var domicilio = document.getElementById("domicilio").value;
  var estado_civil = document.getElementById("estado_civil").value;

  $.ajax({
    type: 'POST',
    url: '/updatemodal',
    data: {
      dni: dni,
      nombre: nombre,
      apellido: apellido,
      email: email,
      cel_1: cel_1,
      act_empresa: act_empresa,
      fecha_nac: fecha_nac,
      domicilio: domicilio,
      estado_civil: estado_civil

    },
    success: function (data) {
      $("#cargando").css("display", "none");
      $("#alert_completa").css("display", "block");
      $("#alert_incompleta").css("display", "none");
      $('#modal-clienteNuevo').modal('hide');
      $('#salida').text("Ficha Actualizada");
      console.log("salida de cccaaaaaa");
      console.log(data);

    }
  });

}


function update_modal_financ() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#cargando").css("display", "inline");

  var dni = document.getElementById("dni").value;
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var email = document.getElementById("email").value;
  var cel_1 = document.getElementById("cel_1").value;
  var act_empresa = document.getElementById("act_empresa").value;
  var fecha_nac = document.getElementById("fecha_nac").value;
  var domicilio = document.getElementById("domicilio").value;
  var estado_civil = document.getElementById("estado_civil").value;

  var profesion = document.getElementById("profesion").value;
  var check_dependencia = document.getElementById("check_dependencia").value;
  var telefono_empleo = document.getElementById("telefono_empleo").value;
  var ingresos = document.getElementById("ingresos").value;
  var nombre_padre = document.getElementById("nombre_padre").value;
  var nombre_madre = document.getElementById("nombre_madre").value;
  var nuevo_domicilio_empleo = document.getElementById("domicilio_empleo").value;
  var nuevo_antiguedad = document.getElementById("antiguedad").value;
  var otros_ingresos = document.getElementById("otros_ingresos").value;


  if (check_dependencia == "on") {
    check_dependencia = 0;
  }

  $.ajax({
    type: 'POST',
    url: '/updatemodalfinanc',
    data: {
      dni: dni,
      nombre: nombre,
      apellido: apellido,
      email: email,
      cel_1: cel_1,
      act_empresa: act_empresa,
      fecha_nac: fecha_nac,
      domicilio: domicilio,
      estado_civil: estado_civil,

      nuevo_profesion: profesion,
      check_dependencia: check_dependencia,
      telefono_empleo: telefono_empleo,
      ingresos: ingresos,
      nombre_padre: nombre_padre,
      nombre_madre: nombre_madre,
      nuevo_domicilio_empleo: nuevo_domicilio_empleo,
      nuevo_antiguedad: nuevo_antiguedad,
      otros_ingresos: otros_ingresos

    },
    success: function (data) {
      $("#cargando").css("display", "none");
      $("#alert_completa").css("display", "block");
      $("#alert_incompleta").css("display", "none");
      $('#modal-clienteNuevo').modal('hide');
      $('#salida').text("Ficha Actualizada");
      console.log(data);

    }
  });

}


function realizaProceso(valorCaja1) {
  var parametros = {
    "valorCaja1": valorCaja1
  };
  $.ajax({
    data: parametros, //datos que se envian a traves de ajax
    url: 'ventas.store', //archivo que recibe la peticion
    type: 'post', //método de envio
    beforeSend: function () {
      $("#resultado").html("Procesando, espere por favor...");
    },
    success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
      $("#resultado").html(response);
    }
  });
}
var i = 1;
function cheques() {
  if (document.getElementById('div-cheques'+i).style.display == "none"){
    document.getElementById('div-cheques'+i).style.display = "block";
    console.log(i);
    i++;
  }
  
}

function cheques_minus(id_cheque) {
  if (document.getElementById('div-cheques'+id_cheque).style.display == "block"){
    console.log(id_cheque);
    document.getElementById('div-cheques'+id_cheque).style.display = "none";

    var total = document.getElementById('inpcheques').value;

    total -= document.getElementById('importe_cheque'+id_cheque).value;

    document.getElementById("inpcheques").value = total;

    i--;
  }
}

function get_valor_i(){
  return i;
}


function validar_check_cheque(obj) {
  if (obj.checked == true) {
    document.getElementById("inpcheques").style.display = "block";
    document.getElementById("detalle_cheque").style.display = "block";
    document.getElementById("inpcheques").required = true;
    document.getElementById("banco0").required = true;
    document.getElementById("numero_cheque0").required = true;
    document.getElementById("fecha_cheque0").required = true;
    document.getElementById("importe_cheque0").required = true;
    document.getElementById("valor_cheque").value = "si";
    console.log(document.getElementById("valor_cheque").value);

  } else {
    $('#inpcheques').removeAttr("required");
    $('#banco').removeAttr("required");
    $('#numero_cheque').removeAttr("required");
    $('#fecha_cheque').removeAttr("required");
    $('#importe_cheque').removeAttr("required");
    document.getElementById("inpcheques").style.display = "none";
    document.getElementById("detalle_cheque").style.display = "none";
    document.getElementById("valor_cheque").value = "no";
    console.log(document.getElementById("valor_cheque").value);
  }

}

function validar_check_financiera(obj) {
  if (obj.checked == true) {
    document.getElementById("check_financ").value = "si";
    $('#modal-financiera').modal('show');
  }
}

function validar_entregado(obj) {
  if (obj.checked == true) {
    document.getElementById("section_usado_entregado").style.display = "block";
    document.getElementById("valor_entregado").value = "si";
    document.getElementById("nomb_titular_entregado").required = true;
    document.getElementById("dominio_entregado").required = true;
    document.getElementById("modelo_entregado").required = true;
    document.getElementById("anio_entregado").required = true;
    document.getElementById("color_entregado").required = true;
    document.getElementById("chasis_num_entregado").required = true;
    document.getElementById("motor_num_entregado").required = true;
  } else {
    document.getElementById("section_usado_entregado").style.display = "none";
    document.getElementById("valor_entregado").value = "no";
  }
  console.log(document.getElementById("valor_entregado").value);
}

function obtener_marca_buscada() {
  var res = document.getElementById("marca").value;
  console.log(res);
  document.getElementById("marca_selec").value = res;

}

var state=0;
function viñeta_0km() {
  var marca = document.getElementById("marca").value;
  var modelo = document.getElementById("modelo").value;
  var version = document.getElementById("version").value;
  var precio = document.getElementById("precio").value;

  if (state==1) {
    $('#modal-0km').modal('hide');
  }

  if ($('#modelo').val().length != 0 && $('#version').val().length != 0 && $('#precio').val().length != 0) {

    document.getElementById("modal_cargar0km").style.display = "none";
    document.getElementById("auto_cargado").style.display = "block";
    document.getElementById("valor_auto_vendido").value = precio;
    document.getElementById("estado_toggle").value = "lista";
    console.log(document.getElementById("estado_toggle").value);
    state=1;

  }
  else{
    document.getElementById("alert").style.display = "block";
  }

  var estadostock = document.getElementById("stock").className;
  console.log(estadostock);
  if (estadostock == "active") {
    $('#marca').removeAttr("required");
    $('#modelo').removeAttr("required");
    $('#version').removeAttr("required");
    $('#precio').removeAttr("required");
    document.getElementById("modal_cargar0km").style.display = "block";
    document.getElementById("auto_cargado").style.display = "none";
    $('#modelo').val('');
    $('#version').val('');
    $('#precio').val('');
    document.getElementById("estado_toggle").value = "stock";
    $('#modal-0km').modal('hide');

  }

}

function send_total(valorCaja1) {
  var parametros = {
    "valorCaja1": valorCaja1
  };
  $.ajax({
    data: parametros, //datos que se envian a traves de ajax
    url: 'ventas.store', //archivo que recibe la peticion
    type: 'post', //método de envio
    beforeSend: function () {
      $("#total").html("Procesando, espere por favor...");
    },
    success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
      $("#total").html(response);
    }
  });
}

var idventa;

function valor_idventa(valor_idventa) {
  idventa = valor_idventa;

}

function changeEstado() {

  $('#modal-estado').modal('show');

  var estado = document.getElementById("select_estado").value;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#cambio_estado").css("display", "none");
  $("#cargando").css("display", "inline");

  $.ajax({
    type: 'POST',
    url: '/changeEstado',
    data: {
      estado: estado,
      state: idventa
    },
    success: function (data) {
      $('#modal-estado').modal('hide');
      $("#cargando").css("display", "none");
      $('#tabla_act').load(" #tabla_act");
      console.log(data);

    }
  });

}

var precio_auto_vendido = 0;
var efectivo = 0;
var total = 0;
var precio = 0;

function show_venta(valor) {

  valor_idventa(valor);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#cambio_estado").css("display", "none");
  $("#cargando").css("display", "inline");

  $.ajax({
    type: 'POST',
    url: '/show_venta',
    data: {
      state: idventa
    },
    success: function (data) {

      var array_select = 0;
      if (data[0].length != 0) {
        array_select = 0;
      } else {
        if (data[1].length != 0) {
          array_select = 1;
        }else {
          array_select = 2;
        }
      }

      var array_datos_cliente=data[array_select];

      var nombre_apellido = array_datos_cliente[0].nombre_apellido;
        var domicilio = array_datos_cliente[0].domicilio;
        var estado_civil = array_datos_cliente[0].estado_civil;
        var dni = array_datos_cliente[0].dni;
        var celular = array_datos_cliente[0].num_tel;
        var act_empresa = array_datos_cliente[0].act_empresa;

        document.querySelector("#show_cliente").innerText = nombre_apellido;
        document.querySelector("#show_domicilio").innerText = domicilio;
        document.querySelector("#show_estado_civil").innerText = estado_civil;
        document.querySelector("#show_dni").innerText = dni;
        document.querySelector("#show_celular").innerText = celular;
        document.querySelector("#show_act_empresa").innerText = act_empresa;

      if (data[0].length != 0) {

        var array_0km = data[0];
        var marca = array_0km[0].nombre;
        var modelo = array_0km[0].modelo;
        var version = array_0km[0].version;
        precio_auto_vendido = array_0km[0].precio_auto_vendido;
        efectivo = array_0km[0].efectivo;
        total = array_0km[0].total;

        document.querySelector("#show_modelo").innerText = modelo;
        document.querySelector("#show_version").innerText = version;
        document.querySelector("#show_marca").innerText = marca;
       
      }

      if (data[1].length !== 0) {

        var array_entregado = data[1];
        var nomb_titular = array_entregado[0].titular;
        var marca = array_entregado[0].nombre;
        var modelo = array_entregado[0].modelo;
        var version = array_entregado[0].version;
        var dominio = array_entregado[0].dominio;
        var chasis_num = array_entregado[0].chasis_num;
        var motor_num = array_entregado[0].motor_num;
        var color = array_entregado[0].color;
        precio_auto_vendido = array_entregado[0].precio;
        efectivo = array_entregado[0].efectivo;
        total = array_entregado[0].total;
        precio = array_entregado[0].precio;

        $("#section_usado_entregado").css("display", "inline");

        document.querySelector("#show_nombre_titular").innerText = nomb_titular;
        document.querySelector("#show_marca_entregado").innerText = marca;
        document.querySelector("#show_modelo_entregado").innerText = modelo;
        document.querySelector("#show_version_entregado").innerText = version;
        document.querySelector("#show_dominio_entregado").innerText = dominio;
        document.querySelector("#show_nummotor_entregado").innerText = motor_num;
        document.querySelector("#show_numchasis_entregado").innerText = chasis_num;
        document.querySelector("#show_color_entregado").innerText = color;
    
      }

      if (data[2].length != 0) {

        var array_usado = data[2];
        var marca = array_usado[0].nombre;
        var modelo = array_usado[0].modelo;
        var version = array_usado[0].version;
        var dominio = array_usado[0].dominio;
        var num_motor = array_usado[0].motor_num;
        var anio = array_usado[0].anio;
        var num_chasis = array_usado[0].chasis_num;
        precio_auto_vendido = array_usado[0].precio_auto_vendido;
        efectivo = array_usado[0].efectivo;
        total = array_usado[0].total;

        $("#section_usado").css("display", "inline");
        
        document.querySelector("#show_modelo").innerText = modelo;
        document.querySelector("#show_version").innerText = version;
        document.querySelector("#show_marca").innerText = marca;
        document.querySelector("#show_dominio").innerText = dominio;
        document.querySelector("#show_nummotor").innerText = num_motor;
        document.querySelector("#show_numchasis").innerText = num_chasis;
        document.querySelector("#show_anio").innerText = anio;

      }

      document.querySelector("#show_precio_auto_vendido").innerText = precio_auto_vendido;
      document.querySelector("#show_efectivo").innerText = efectivo;
      document.querySelector("#show_valor_entregado").innerText = precio;
      document.querySelector("#show_total").innerText = total;

      console.log(precio_auto_vendido + efectivo + precio);
      console.log(precio_auto_vendido);
      console.log(efectivo);
      console.log(precio);
    }
  });

}

function visible(valor_box,tipo_operacion){
  var cancer = document.getElementById("cancer").value;
  var estado_toggle = document.getElementById("estado_toggle").value;

  if (cancer == "not_select") { 
    alert("Debe seleccionar el cliente para continuar");
  }
  else{
  if (valor_box == 1 ) {
  $("#box1").css("display", "none");
  $("#cargando").css("display", "none");
  next_register_cliente(tipo_operacion);
  }
}

if (estado_toggle == "null" && valor_box != 1 ) {
  alert("Debe seleccionar un vehículo para continuar");
}
else{
  if (estado_toggle != "null") {
  $("#box2").css("display", "none");
    $("#cargando").css("display", "none");
    next_register_auto(tipo_operacion);
  }
}

}

var dni_nya;

function next_register_cliente(tipo_operacion){
  
  var fecha_oper = document.getElementById("fecha_oper").value;
  var cancer = document.getElementById("cancer").value;

  if (cancer == "nuevo") {

  var nuevo_dni = document.getElementById("nuevo_dni").value;
  dni_nya = nuevo_dni;
  var nuevo_nombre = document.getElementById("nuevo_nombre").value;
  var nuevo_apellido = document.getElementById("nuevo_apellido").value;
  var nuevo_fecha_nac = document.getElementById("nuevo_fecha_nac").value;
  var nuevo_estado_civil = document.getElementById("nuevo_estado_civil").value;
  var nuevo_email = document.getElementById("nuevo_email").value;
  var nuevo_cel_1 = document.getElementById("nuevo_cel_1").value;
  var nuevo_domicilio = document.getElementById("nuevo_domicilio").value;
  var nuevo_act_empresa = document.getElementById("nuevo_act_empresa").value;

  var nuevo_profesion = document.getElementById("nuevo_profesion").value;
  var check_dependencia = document.getElementById("check_dependencia").value;
  var nuevo_domicilio_empleo = document.getElementById("nuevo_domicilio_empleo").value;
  var telefono_laboral = document.getElementById("telefono_laboral").value;
  var nuevo_antiguedad = document.getElementById("nuevo_antiguedad").value;
  var nuevo_ingresos_mesuales = document.getElementById("nuevo_ingresos_mesuales").value;
  var nuevo_otros_ingresos = document.getElementById("nuevo_otros_ingresos").value;
  var nuevo_nombre_padre = document.getElementById("nuevo_nombre_padre").value;
  var nuevo_nombre_madre = document.getElementById("nuevo_nombre_madre").value;
    
  }else{
    var nya_cliente = document.getElementById("nya_cliente").value;
    dni_nya = nya_cliente;
  }
  
  var input_conyuge = document.getElementById("input_conyuge").value;

  if (input_conyuge == "si") {
    var conyuge_dni = document.getElementById("conyuge_dni").value;
    var conyuge_nombre = document.getElementById("conyuge_nombre").value;
    var conyuge_apellido = document.getElementById("conyuge_apellido").value;
    var conyuge_fecha_nac = document.getElementById("conyuge_fecha_nac").value;
    //var conyuge_estado_civil = document.getElementById("conyuge_estado_civil").value;
    var conyuge_email = document.getElementById("conyuge_email").value;
    var conyuge_cel_1 = document.getElementById("conyuge_cel_1").value;
    var conyuge_domicilio = document.getElementById("conyuge_domicilio").value;
    var conyuge_act_empresa = document.getElementById("conyuge_act_empresa").value;

  var conyuge_profesion = document.getElementById("conyuge_profesion").value;
  var check_dependencia = document.getElementById("check_dependencia").value;
  var conyuge_domicilio_empleo = document.getElementById("conyuge_domicilio_empleo").value;
  var telefono_laboral = document.getElementById("telefono_laboral").value;
  var conyuge_antiguedad = document.getElementById("conyuge_antiguedad").value;
  var conyuge_ingresos_mesuales = document.getElementById("conyuge_ingresos_mesuales").value;
  var conyuge_otros_ingresos = document.getElementById("conyuge_otros_ingresos").value;
  var conyuge_nombre_padre = document.getElementById("conyuge_nombre_padre").value;
  var conyuge_nombre_madre = document.getElementById("conyuge_nombre_madre").value;

  }

  if (tipo_operacion == 2){
  
  var input_garante = document.getElementById("input_garante").value;

  if (input_garante == "si") {
    var garante_dni = document.getElementById("garante_dni").value;
    var garante_nombre = document.getElementById("garante_nombre").value;
    var garante_apellido = document.getElementById("garante_apellido").value;
    var garante_fecha_nac = document.getElementById("garante_fecha_nac").value;
    var garante_estado_civil = document.getElementById("garante_estado_civil").value;

    var garante_cel_1 = document.getElementById("garante_cel_1").value;
    var garante_cel_2 = document.getElementById("garante_cel_2").value;
    var garante_domicilio = document.getElementById("garante_domicilio").value;
    var garante_act_empresa = document.getElementById("garante_act_empresa").value;
  }
}

if (tipo_operacion == 2){
  $url = '/store_cliente';
}
else{
  $url = '/store_cliente_contado';
}
  
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  type: 'PUT',
  url: $url,
  data: {
    fecha_oper:fecha_oper,
    cancer: cancer,
    input_conyuge:input_conyuge,
    input_garante:input_garante,
    nya_cliente:nya_cliente,
    nuevo_dni:nuevo_dni,
    nuevo_nombre:nuevo_nombre,
    nuevo_apellido:nuevo_apellido,
    nuevo_fecha_nac: nuevo_fecha_nac,
    nuevo_estado_civil:nuevo_estado_civil,
    nuevo_email:nuevo_email,
    nuevo_cel_1:nuevo_cel_1,
    nuevo_domicilio:nuevo_domicilio,
    nuevo_act_empresa:nuevo_act_empresa,
    nuevo_profesion:nuevo_profesion,
    check_dependencia:check_dependencia,
    nuevo_domicilio_empleo:nuevo_domicilio_empleo,
    telefono_laboral:telefono_laboral,
    nuevo_antiguedad:nuevo_antiguedad,
    nuevo_ingresos_mesuales:nuevo_ingresos_mesuales,
    nuevo_otros_ingresos:nuevo_otros_ingresos,
    nuevo_nombre_padre:nuevo_nombre_padre,
    nuevo_nombre_madre:nuevo_nombre_madre,
    conyuge_dni:conyuge_dni,
    conyuge_nombre:conyuge_nombre,
    conyuge_apellido:conyuge_apellido,
    conyuge_fecha_nac:conyuge_fecha_nac,
    conyuge_email:conyuge_email,
    conyuge_cel_1:conyuge_cel_1,
    conyuge_domicilio:conyuge_domicilio,
    conyuge_act_empresa:conyuge_act_empresa,
    conyuge_profesion:conyuge_profesion,
    check_dependencia:check_dependencia,
    conyuge_domicilio_empleo:conyuge_domicilio_empleo,
    conyuge_antiguedad:conyuge_antiguedad,
    conyuge_ingresos_mesuales:conyuge_ingresos_mesuales,
    conyuge_otros_ingresos:conyuge_otros_ingresos,
    conyuge_nombre_padre:conyuge_nombre_padre,
    conyuge_nombre_madre:conyuge_nombre_madre,
    garante_dni:garante_dni,
    garante_nombre:garante_nombre,
    garante_apellido:garante_apellido,
    garante_fecha_nac:garante_fecha_nac,
    garante_estado_civil:garante_estado_civil,
    garante_cel_1:garante_cel_1,
    garante_cel_2:garante_cel_2,
    garante_domicilio:garante_domicilio,
    garante_act_empresa:garante_act_empresa


  },
  success: function (data) {
    
    $("#box2").css("display", "block");
    $("#inf_circle").css("display", "none");
    $("#inf_circle_check").css("display", "block");

  }
});

}

function back_register_cliente(){
      $("#box2").css("display", "none");
      $("#box1").css("display", "block");
}

var idusado;
var idauto0km;

function next_register_auto(tipo_operacion){

  var estado_toggle = document.getElementById("estado_toggle").value;

  if (estado_toggle =="stock" ) {
  var select_cero = document.getElementById("select_cero").value;
  }else{
    if (estado_toggle =="lista" ) {
      var marca = document.getElementById("marca").value;
      var modelo = document.getElementById("modelo").value;
      var version = document.getElementById("version").value;
    }
  }

  check_usado = document.getElementById("check_usado").value;

  if (check_usado =="si" ) {
    var check_select_usado = document.getElementById("check_select_usado").value;
  }

  if (tipo_operacion == 2){
    $url = '/store_auto_adquirido';
  }
  else{
    $url = '/store_auto_adquirido_contado';
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $.ajax({
    type: 'PUT',
    url: $url,
    data: {
      check_usado:check_usado,
      estado_toggle:estado_toggle,
      select_cero:select_cero,
      marca:marca,
      modelo:modelo,
      version:version,
      check_select_usado:check_select_usado,
    },
    success: function (data) {
      
      $("#box3").css("display", "block");
      idusado = data[0];
      idauto0km =data[1];

      $("#adq_circle").css("display", "none");
      $("#adq_circle_check").css("display", "block");

    }
  });
}

function back_register_auto(){
  $("#box3").css("display", "none");
  $("#box2").css("display", "block");
}

function next_register_pago(tipo_operacion){

  var valor_entregado = document.getElementById("valor_entregado").value;

  if (valor_entregado =="si") {
    
    var marca_entregado = document.getElementById("marca_entregado").value;
    var modelo_entregado = document.getElementById("modelo_entregado").value;
    var version_entregado = document.getElementById("version_entregado").value;
    var color_entregado = document.getElementById("color_entregado").value;
    var valor_auto_entregado = document.getElementById("valor_auto_entregado").value;

    var nomb_titular_entregado = document.getElementById("nomb_titular_entregado").value;
    var anio_entregado = document.getElementById("anio_entregado").value;
    var dominio_entregado = document.getElementById("dominio_entregado").value;
    var chasis_num_entregado = document.getElementById("chasis_num_entregado").value;
    var motor_num_entregado = document.getElementById("motor_num_entregado").value;
    var fecha_ingreso = document.getElementById("fecha_ingreso").value;
    
    if (modelo_entregado == "0") {
      alert("aca");
    }

  }

  //var restotal = document.getElementById("restotal").value;
  var valor_auto_vendido = document.getElementById("valor_auto_vendido").value;
  var inpefectivo = document.getElementById("inpefectivo").value;
  var saldo_neto = document.getElementById("saldo_neto").value;

  var id_user = document.getElementById("id_user").value;

  var valor_cheque = document.getElementById("valor_cheque").value;
  
  if (valor_cheque == "si") {

  var i= get_valor_i();
  i--;
  var array_cheque = [];
  var j = 1;
 
    var numero_cheque = document.getElementById("numero_cheque0").value;
    var fecha_cheque = document.getElementById("fecha_cheque0").value;
    var banco = document.getElementById("banco0").value;
    var importe_cheque = document.getElementById("importe_cheque0").value;
    array_cheque.push([numero_cheque, fecha_cheque, banco,importe_cheque]);
  
  while (j <= i) {
    var numero_cheque = document.getElementById("numero_cheque"+j).value;
    var fecha_cheque = document.getElementById("fecha_cheque"+j).value;
    var banco = document.getElementById("banco"+j).value;
    var importe_cheque = document.getElementById("importe_cheque"+j).value;

    array_cheque.push([numero_cheque, fecha_cheque, banco,importe_cheque]);
    j++;
  }
  console.log(array_cheque);
  }

  if (tipo_operacion == 2) {

      
  var saldo_financ = document.getElementById("saldo_financ").value;
  var cant_cuotas = document.getElementById("cant_cuotas").value;
  var monto = document.getElementById("monto").value;
  

    var check_financ = document.getElementById("check_financ").value;

    if (check_financ == "si") {

      var cant_cuotas = document.getElementById("cant_cuotas").value;
      var monto = document.getElementById("monto").value;
      var saldo_financ = document.getElementById("saldo_financ").value;
      
    }
  }

  if (tipo_operacion == 2){
    $url = '/store_forma_pago';
  }
  else{
    $url = '/store_forma_pago_contado';
  }
  

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $.ajax({
    type: 'PUT',
    url: $url,
    data: {   
      dni_nya:dni_nya, 
      idusado:idusado,
      idauto0km:idauto0km,
      valor_entregado:valor_entregado,  
      marca_entregado:marca_entregado,
      modelo_entregado:modelo_entregado,
      version_entregado:version_entregado,
      color_entregado:color_entregado,
      valor_auto_entregado:valor_auto_entregado,
      
      fecha_ingreso:fecha_ingreso,
      nomb_titular_entregado:nomb_titular_entregado,
      anio_entregado:anio_entregado,
      dominio_entregado:dominio_entregado,
      chasis_num_entregado:chasis_num_entregado,
      motor_num_entregado:motor_num_entregado,

      //restotal:restotal,
      valor_auto_vendido:valor_auto_vendido,
      inpefectivo:inpefectivo,
      saldo_neto:saldo_neto,
      cant_cuotas:cant_cuotas,
      monto:monto,
      id_user:id_user,
      valor_cheque:valor_cheque,
      array_cheque:array_cheque,

      cant_cuotas:cant_cuotas,
      monto:monto,
      saldo_financ:saldo_financ

    },
    success: function (data) {
      $("#pago_circle").css("display", "none");
      $("#pago_circle_check").css("display", "block");

      $("#box3").css("display", "block");
      window.location.replace("/venta");
    
    }
  });
}

function verificar() {

  if ($('#cant_cuotas').val().length != 0 && $('#monto').val().length != 0 &&
      $('#saldo_financ').val().length != 0) {
      $('#modal-financiera').modal('hide');

  }
}

function sumar() {
  var total = 0;

  $(".monto_cheque").each(function () {

      if (isNaN(parseFloat($(this).val()))) {

          // total += 0;

      } else {

          total += parseFloat($(this).val());

      }

  });

  document.getElementById("inpcheques").value = total;

}