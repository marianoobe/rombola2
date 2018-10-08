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
					<div class="form-group">
                        @php
                        $cuotas = [
                            "1" => "1",
                            "2" => "2",
                            "3" => "3",
                            "4" => "4",
                            "5" => "5",
                            "6" => "6",
                        ];
                        @endphp
                            {!! Form::select('tipofinanciera',$tipo_finan,['class'=>'form-group'],['id'=>'tipofinanciera']) !!}
                        </div>
					<div class="form-group">
                        <label>Nombre de Financiera</label>
                        {!! Form::text("nombrefinanc") !!}
                    </div>
                    <div class="form-group">
                            <label>Cantidad de Cuotas</label>                           
                            {!! Form::select('cantcuotas[]',$cuotas,['class'=>'form-group'],['id'=>'cantcuotas','multiple' => true]) !!}

                        </div>
                        
                        {!! Form::submit("Guardar") !!}
                        
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