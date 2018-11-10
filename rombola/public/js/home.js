$(document).ready(function () {
    $('#btn_prueba').onclick(function (event) {
        //document.getElementById("box-financiera").style.display = "block";
        $.get(`prueba`, function (response, tipofinanciera) {
            $("#nombfinanciera").empty();
            response.forEach(element => {
                $("#nombfinanciera").append(`<option value=${element.idfinanciera}>${element.nomb_financ}</option>`);
            });

        }); 
    });
});