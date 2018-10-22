@extends('adminlte::layouts.app')


@section('seccion')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="box">
                <div class="box-header with-border">


                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">AUTO 0KM</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box-header">


                        </div>

                        <div class="box-body">
                            <form method="POST" action="{{ route('listaprecios.store') }}" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>*MARCA DE VEHICULO</strong></label>
                                        <select id="marca" name="marca" class="selectpicker show-tick"
                                            data-show-subtext="true" data-live-search="true" data-style="btn-primary"
                                            data-placeholder="Seleccione marca vehiculo..." data-width="100%">
                                            <option value="">Seleccionar marca del vehiculo</option>
                                            @foreach ($marcas as $item)
                                            <option value="$item->id"> {{ $item->nombre }} </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>FECHA DE LISTA</strong></label>
                                        <input type="month" id="mes" name="mes">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-6">

                                    <div class=" col-xs-12" style="background-color:rgb(229, 245, 253);">
                                        <label for="apellido">Archivo a subir (Formato: PDF) </label>
                                        <input type="file" class="form-control" id="file" name="file" required>
                                    </div>
                                </div>

                       

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary">
                                Guardar</button>
                        </div>

                        </form>
                    </div>

                </div>
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
                url: 'autos.store', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultado").html(response);
                }
            });
        }
    </script>



    @endsection