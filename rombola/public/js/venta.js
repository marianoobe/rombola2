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
  } else {
    document.getElementById("garante").style.display = "none";
    $('#garante_dni').removeAttr("required");
    $('#garante_nombre').removeAttr("required");
    $('#garante_apellido').removeAttr("required");
    $('#garante_fecha_nac').removeAttr("required");
    $('#garante_cel_1').removeAttr("required");
    $('#garante_domicilio').removeAttr("required");
    $('#garante_act_empresa').removeAttr("required");
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

  } else {
    if (document.getElementById("buscar").style.display == "block") {
      document.getElementById("buscar").style.display = "none";
      $('#dnis').removeAttr("required");
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
    document.getElementById("cancer").value = "buscar";
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
}

function obtenervalue() {
  var res = document.getElementById("buscar_usados").value;
  console.log(res);
  document.getElementById("modelousado").value = res;

}

function obtener_cliente_buscado() {
  var res = document.getElementById("dnis").value;
  console.log(res);
  document.getElementById("nya_cliente").value = res;

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

function cheques() {
  $('.div-cheques').append('<div class="col-xs-12 col-lg-2"><input id="idCheques" name="inp-idCheques[]" type="hidden" value="0"><div class="form-group"><label><strong>Banco</strong></label><input type="text" maxlength="150" class="form-control" name="inp-banco[]"placeholder=""></div></div> <div class="col-xs-12 col-lg-3"> <div class="form-group"> <label><strong>Número</strong></label> <input type="text" maxlength="65" class="form-control" name="inp-numCheque[]" placeholder=""> </div> </div> <div class="col-xs-12 col-lg-3"> <div class="form-group"> <label><strong>Fecha</strong></label> <div class="input-group date" name="date-fechaPagCheque[]"> <input type="text" class="form-control"> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div> </div> </div> <div class="col-xs-12 col-lg-3"> <div class="form-group"> <label><strong>Importe</strong></label> <input type="text" maxlength="65" class="form-control" name="inp-importe[]" onblur="darFormato(this);" placeholder=""> </div> </div>');
}

function validar_check_cheque(obj) {
  if (obj.checked == true) {
    document.getElementById("inpcheques").style.display = "block";
    document.getElementById("detalle_cheque").style.display = "block";
    document.getElementById("inpcheques").required = true;
    document.getElementById("banco").required = true;
    document.getElementById("numero_cheque").required = true;
    document.getElementById("fecha_cheque").required = true;
    document.getElementById("importe_cheque").required = true;
    document.getElementById("valor_cheque").value = "si";

  } else {
    $('#inpcheques').removeAttr("required");
    $('#banco').removeAttr("required");
    $('#numero_cheque').removeAttr("required");
    $('#fecha_cheque').removeAttr("required");
    $('#importe_cheque').removeAttr("required");
    document.getElementById("inpcheques").style.display = "none";
    document.getElementById("detalle_cheque").style.display = "none";
    document.getElementById("valor_cheque").value = "no";
  }
}

function validar_check_financiera(obj) {
  if (obj.checked == true) {
    $('#modal-financiera').modal('show');
  }
}

  function validar_entregado(obj) {
    if (obj.checked == true) {
      document.getElementById("section_usado_entregado").style.display = "block";
      document.getElementById("valor_entregado").value = "si";
      document.getElementById("nomb_titular").required = true;
      document.getElementById("dominio").required = true;
      document.getElementById("conyuge_act_empresa").required = true;
      document.getElementById("modelo").required = true;
      document.getElementById("anio").required = true;
      document.getElementById("color").required = true;
      document.getElementById("chasis_num").required = true;
      document.getElementById("motor_num").required = true;
    } else {
      document.getElementById("section_usado_entregado").style.display = "none";
      document.getElementById("valor_entregado").value = "no";
    }
  }

  function obtener_marca_buscada() {
    var res = document.getElementById("marca").value;
    console.log(res);
    document.getElementById("marca_selec").value = res;
  
  }

  function check_lista_usados(valorCaja1) {
    console.log(valorCaja1);
    if (obj.checked == true) {
      var parametros = {
        "valorCaja1": valorCaja1
      };
      $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'ventas.store', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
          $("#select_usado").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $("#select_usado").html(response);
        }
      });
    }
  }

  function viñeta_0km(){
    var marca = document.getElementById("marca").value;
    var modelo = document.getElementById("modelo").value;
    var version = document.getElementById("version").value;
    var precio = document.getElementById("precio").value;

    
    if(modelo!=null){
    
      document.getElementById("modal_cargar0km").style.display = "none";
      document.getElementById("auto_cargado").style.display = "block";
      document.getElementById("valor_auto_vendido").value = precio;
      document.getElementById("estado_toggle").value = "lista";
      console.log(document.getElementById("estado_toggle").value);
      
    }

    var estadostock = document.getElementById("stock").className;
    console.log(estadostock);
    if (estadostock == "active") {
      $('#marca').removeAttr("required");
      $('#modelo').removeAttr("required");
      $('#version').removeAttr("required");
      $('#precio').removeAttr("required");
      document.getElementById("estado_toggle").value = "stock";
    }
    console.log(document.getElementById("estado_toggle").value);

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
