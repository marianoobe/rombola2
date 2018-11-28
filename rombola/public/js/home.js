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

function changeEstado(){

    var estado = document.getElementById("select_estado").value;
    var state = document.getElementById("venta_id").value;

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
         state: state
        },
    success: function (data) {
      $('#modal-estado').modal('hide');
      $("#cargando").css("display", "none");
      setInterval($('#tabla_act').load('prueba1'), 0);
      console.log(data);

    }
  });

  }