@extends('adminlte::layouts.app')
@include('adminlte::layouts.partials.htmlheader')
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
                                "4" => "4",
                                "8" => "8",
                                "12" => "12",
                                "24" => "24",
                                "36" => "36",
                                ];
                                @endphp
                                <label><strong>Tipo de Financiación: </strong></label>
                                {!!
                                Form::select('tipofinanciera',$tipo_finan,null,['class'=>'form-control','id'=>'tipofinanciera'])
                                !!}
                            </div>
                            <div class="form-group">
                                <p></p>
                                <label><strong>Nombre de Financiera: </strong></label><br>
                                {!! Form::text("nombrefinanc") !!}
                            </div>
                            <div class="form-group">
                                <p></p>
                                <label><strong>Cantidad de Cuotas</strong></label>
                                {!!Form::select('cantcuotas[]',$cuotas,null,['class'=>'form-control','id'=>'cantcuotas','multiple'=> true])!!}
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

    <input id="money" type="text" class="form-control" />

    {!! Form::close() !!}
   
    @endsection