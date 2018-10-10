function obtener_valor_select(valorCaja1) {
    var parametros = {
        "valorCaja1": valorCaja1
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'pre-venta.respuesta', //archivo que recibe la peticion
        type: 'get', //método de envio
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
        }
    });
}

function obtener(opt) {
    //document.getElementById("pepe").style.display = "block";

    var selected = opt.options[opt.selectedIndex].value;

    //var financieras = f; //Tu array de provincias
    var select = document.getElementById("nomb_financiera"); //Seleccionamos el select

    for (var i = 0; i < financieras.length; i++) {
        var option = document.createElement("option"); //Creamos la opcion
        option.innerHTML = financieras[i]; //Metemos el texto en la opción
        select.appendCvhild(option); //Metemos la opción en el select
    }

}

function validar_check(obj) {
    if (obj.checked == true) {
        document.getElementById("otropago").disabled = false;
    } else {
        document.getElementById("otropago").disabled = true;
    }
}

$(document).ready(function () {

    $('#tipofinanciera').change(function (event) {
        document.getElementById("box-financiera").style.display = "block";
        $.get(`financiera/${event.target.value}`, function (response, tipofinanciera) {
            $("#nombfinanciera").empty();
            response.forEach(element => {
                $("#nombfinanciera").append(`<option value=${element.idfinanciera}>${element.nomb_financ}</option>`);
            });

        });
    });

    $('#nombfinanciera').change(function (event) {
        document.getElementById("box-cuotas").style.display = "block";
        $.get(`cuotas/${event.target.value}`, function (response, idfinanciera) {
            $("#cantcuotas").empty();
            response.forEach(element => {
                $("#cantcuotas").append(`<option value=${element.idcant}> ${element.numcuotas} </option>`);
            });

        });
    });

    $('#cantcuotas').change(function (event) {
        document.getElementById("box-importe").style.display = "block";
        /*$.get(`cuotas/${event.target.value}`, function (response, idfinanciera) {
            
            $("#cantcuotas").empty();
            response.forEach(element => {
                $("#cantcuotas").append(`<option value=${element.idcant}> ${element.numcuotas} </option>`);
            });
            

        });*/
    });

});


