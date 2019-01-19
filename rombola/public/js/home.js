var f=1;
function offbell() {
    if (f==1) {
        animacion = function(){
  
            $("#campana").fadeTo(500, .1)
                            .fadeTo(500, 1);
        }
        setInterval(animacion, 1000);
        f=2;
    }
    if (f==2) {
        $("#campana").fadeTo(0, 0)
                            .fadeTo(0, 0);
    }
    
}


var idventa;

function valor_idventa(valor_idventa){
    idventa = valor_idventa;
    
}

function changeEstado(){

    $('#modal-estado').modal('show');

    var estado = document.getElementById("select_estado").text;


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

      if (estado=="EN NEGOCIACIÓN") {
        $('#estado_label').addClass("label label-warning");
        console.log(estado);
    }
      console.log(data);

    }
  });

  }