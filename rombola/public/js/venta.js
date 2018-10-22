function validar_check_conyuge(obj) {
  if (obj.checked == true) {
    document.getElementById("conyuge").style.display = "block";
    document.getElementById("conyuge_dni").required=true;
    document.getElementById("conyuge_nombre").required=true;
    document.getElementById("conyuge_apellido").required=true;
    document.getElementById("conyuge_fecha_nac").required=true;
    document.getElementById("conyuge_cel_1").required=true;
    document.getElementById("conyuge_domicilio").required=true;
    document.getElementById("conyuge_act_empresa").required=true;
  } else {
    document.getElementById("conyuge").style.display = "none";
    document.getElementById("conyuge_dni").removeAttr("required");
    document.getElementById("conyuge_nombre").removeAttr("required");
    document.getElementById("conyuge_apellido").removeAttr("required");
    document.getElementById("conyuge_fecha_nac").removeAttr("required");
    document.getElementById("conyuge_cel_1").removeAttr("required");
    document.getElementById("conyuge_domicilio").removeAttr("required");
    document.getElementById("conyuge_act_empresa").removeAttr("required");
  }
}

function validar_check_garante(obj) {
  if (obj.checked == true) {
    document.getElementById("garante").style.display = "block";
    document.getElementById("garante_dni").required=true;
    document.getElementById("garante_nombre").required=true;
    document.getElementById("garante_apellido").required=true;
    document.getElementById("garante_fecha_nac").required=true;
    document.getElementById("garante_cel_1").required=true;
    document.getElementById("garante_domicilio").required=true;
    document.getElementById("garante_act_empresa").required=true;
  } else {
    document.getElementById("garante").style.display = "none";
    document.getElementById("garante_dni").removeAttr("required");
    document.getElementById("garante_nombre").removeAttr("required");
    document.getElementById("garante_apellido").removeAttr("required");
    document.getElementById("garante_fecha_nac").removeAttr("required");
    document.getElementById("garante_cel_1").removeAttr("required");
    document.getElementById("garante_domicilio").removeAttr("required");
    document.getElementById("garante_act_empresa").removeAttr("required");
  }
}


function enable_buscar() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "none") {
      document.getElementById("buscar").style.display = "block";
      document.getElementById("cancer").value = "buscar";
      $('#nombre').removeAttr("required");
  } else {
      if (document.getElementById("buscar").style.display == "block") {
          document.getElementById("buscar").style.display = "none";
      }
  }

  if (document.getElementById("buscar").style.display == "none" && document.getElementById("nuevo").style.display == "block") {
      document.getElementById("buscar").style.display = "block";
      document.getElementById("nuevo").style.display = "none";
      $('#nombre').removeAttr("required");
      document.getElementById("cancer").value = "buscar";
  }
}

function enable_nuevo() {
  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "none") {
      document.getElementById("nuevo").style.display = "block";
      document.getElementById("cancer").value = "nuevo";
  } else {
      if (document.getElementById("nuevo").style.display == "block") {
          document.getElementById("nuevo").style.display = "none";
          $('#nombre').removeAttr("required");

      }
  }

  if (document.getElementById("nuevo").style.display == "none" && document.getElementById("buscar").style.display == "block") {
      document.getElementById("nuevo").style.display = "block";
      document.getElementById("buscar").style.display = "none";
      $('#nombre').removeAttr("required");
  }
}