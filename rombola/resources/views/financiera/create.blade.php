@extends('adminlte::layouts.app')

@section('seccion1')

<div class="container-fluid spark-screen">

    {!! Form::open(['route'=>'financiera.store','method'=>'post','class'=>'form-group']) !!}

    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <!-- Default box -->
            <div class="box box-primary">
                <div ALIGN="left" class="box-header with-border">
                    <h3 class="box-title">Nueva Financiera</h3>
                </div>

                <div class="box-body">
                    <div class="row margenBoot-25">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                @php
                                $cuotas = [
                                "0" => "4",
                                "1" => "8",
                                "2" => "12",
                                "3" => "24",
                                "4" => "36",
                                ];
                                @endphp
                                <label><strong>Tipo de Financiación: </strong></label>
                                {!!
                                Form::select('tipofinanciera',$tipo_finan,null,['class'=>'form-control','id'=>'tipofinanciera'])
                                !!}
                            </div>
                            <div class="form-group">
                                <p></p>
                                <label><strong>Nombre de Financiera: </strong></label>
                                {!! Form::text("nombrefinanc") !!}
                            </div>
                            <div class="form-group">
                                <p></p>
                                <label><strong>Cantidad de Cuotas</strong></label>
                                {!!Form::select('tipofinanciera',$cuotas,null,['class'=>'form-control','id'=>'tipofinanciera','multiple'=> true])!!}
                            </div>
                            <p></p>
                            {!! Form::submit("Guardar",['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->

    {!! Form::close() !!}

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
    </script>
    @endsection