@extends('adminlte::layouts.app')

@section('seccion')

<div class="container-fluid spark-screen">

    {!! Form::open(['route'=>'listaprecio.store','method'=>'post','class'=>'form-group']) !!}

    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <!-- Default box -->
            <div class="box box-primary">
                <div ALIGN="left" class="box-header with-border">
                    <h3 class="box-title">Lista de Precios</h3>
                </div>

                <div class="box-body">
                    <div class="row margenBoot-25">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label><strong>Formato: </strong></label>
                            </div>          
                            {!! Form::text("formato") !!}
                             
                            {!! Form::submit("Guardar Lista",['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    
    {!! Form::close() !!}
    
</div>

@endsection