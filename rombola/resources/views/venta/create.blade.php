@extends('adminlte::layouts.app')


@section('seccion1')
<meta name="csrf-token" content="<?= csrf_token() ?>">
</meta>
<div class="container-fluid spark-screen">
    <form method="post" action="{{ route('venta.store') }}">
        {!! Html::script('js/venta.js') !!}
        <div class="row">
            <div class="col-md-14 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inicio de Operación</h3>

                        <div class="box-tools pull-right">
                            <a class="btn btn-xs btn-success" onclick="history.back(1);">
                                <i class="fa fa-chevron-left"></i> VOLVER</a>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-offset-2 col-lg-3">
                                <div class="form-group">
                                    <div class='input-group date'>
                                        @php
                                        $fecha = date("d-m-Y");
                                        @endphp
                                        <input type="text" class="form-control" id="fecha_oper" name="fecha_oper" value="{{$fecha}}"
                                            disabled>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-offset-2 col-lg-3">
                                <input type="text" maxlength="125" class="form-control" id="nom_vendedor" disabled="disabled"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-14 col-md-offset-0">
                <div class="box box-primary">
                    <div ALIGN="left" class="box-header with-border">
                        <h3 class="box-title">Información del Cliente</h3>
                    </div>

                    <div class="box-body">
                        <input type="text" id="id_user" name="id_user" style="display:none" value="{{ Auth::user()->id }}">
                        <input type="text" id="cancer" name="cancer" style="display:none">
                        <input type="text" id="tipodni" name="tipodni" style="display:none">
                        <input type="text" id="nya_cliente" name="nya_cliente" style="display:none">

                        <div class="row margenBoot-25">
                            <div class="col-xs-14 col-lg-6">
                                <button onclick="enable_buscar()" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">Buscar
                                    Cliente</button>
                                <section id="buscar" style="display:none">
                                    <select id="dnis" onchange="obtener_cliente_buscado()" class="selectpicker"
                                        data-live-search="true" data-width="100%" data-size="4">
                                        <option>Seleccione nombre</option>
                                        @foreach ($nombapell as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>

                                </section>
                                <div class="col-xs-12 col-lg-4">
                                    <img id="cargando" style="display:none;" src="/img/cargando.gif"></img>
                                    <br>
                                    <div id="alert_completa" class="alert alert-success" style="display:none;" role="alert">
                                        <p id="salida"></p>
                                    </div>
                                    <div id="alert_incompleta" class="alert alert-danger" style="display:none;" role="alert">
                                        <a href="#" onclick="modal_edit();" data-toggle="modal" data-target="#modal-clienteNuevo">
                                            <p id="salida_danger"></p>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-lg-4">
                                </div>

                                <div id="panel_financ" style="display:none;" class="panel panel-default">
                                        <div class="panel-body">
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>Teléfono Laboral</strong>(tel. fijo o celular)</label>
                                            <input type="text" class="form-control" id="nuevo_cel_2" name="nuevo_cel_2">
                                        </div>

                                        <div class="form-group">
                                            <label><strong>*Profesión</strong></label>
                                            <input type="text" class="form-control" id="nuevo_profesion" name="nuevo_profesion"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Relación de dependencia</strong></label>
                                            <br>
                                            <input id="check_dependencia" onchange="validar_dependencia(this);" type="checkbox"
                                                data-style="slow" data-toggle="toggle" data-size="normal" data-on="Si"
                                                data-off="No">
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Domicilio de Empleo</strong>(Calle - N° - Departamento)</label>
                                            <input type="text" class="form-control" id="nuevo_domicilio_empleo" name="nuevo_domicilio_empleo">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Teléfono del Empleo</strong>(Celular o fijo)</label>
                                            <input type="number" class="form-control" id="nuevo_domicilio_empleo" name="nuevo_domicilio_empleo">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>*Antiguedad</strong></label>
                                            <input type="number" class="form-control" id="nuevo_antiguedad" name="nuevo_antiguedad"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Ingreso Mensual</strong></label>
                                            <input type="number" class="form-control" id="nuevo_ingresos_mesuales" name="nuevo_ingresos_mesuales"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Nombre de Padre</strong></label>
                                            <input type="text" class="form-control" id="nuevo_nombre_padre" name="nuevo_nombre_padre"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Nombre de Madre</strong></label>
                                            <input type="text" class="form-control" id="nuevo_nombre_madre" name="nuevo_nombre_madre"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            
                            </div>
                            <div class="col-xs-14 col-lg-6">
                                <button onclick="enable_nuevo()" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">Nuevo
                                    Cliente</button>
                            </div>
                        </div>
                        <section id="nuevo" style="display:none">
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>*DNI</strong></label>
                                        <input type="number" class="form-control" id="nuevo_dni" name="dni" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Nombres</strong></label>
                                        <input type="text" class="form-control" id="nuevo_nombre" name="nombre"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Apellidos</strong></label>
                                        <input type="text" class="form-control" id="nuevo_apellido" name="apellido"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Fecha de Nacimiento</strong></label>
                                        <input type="date" class="form-control" id="nuevo_fecha_nac" name="nuevo_fecha_nac">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Estado Civil</strong></label>
                                        <select id="nuevo_estado_civil" name="nuevo_estado_civil" class="form-control form-control-sm">
                                            <option>Soltero</option>
                                            <option>Convive</option>
                                            <option>Casado</option>
                                            <option>Divorciado</option>
                                            <option>Viudo</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>*Correo Electrónico</strong></label>
                                        <input type="email" placeholder="email@gmail.com" class="form-control" id="nuevo_email"
                                            name="nuevo_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Celular</strong></label>
                                        <input type="text" class="form-control" id="nuevo_cel_1" name="nuevo_cel_1"
                                            required>
                                    </div>


                                    <div class="form-group">
                                        <label><strong>*Domicilio </strong>(Calle - N° - Departamento)</label>
                                        <input type="text" class="form-control" id="nuevo_domicilio" name="nuevo_domicilio">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Actividad/Empresa</strong></label>
                                        <input type="text" class="form-control" id="nuevo_act_empresa" name="nuevo_act_empresa"
                                            required>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-lg-6">

                                    <div class="form-group">
                                        <label><strong>Teléfono Laboral</strong>(tel. fijo o celular)</label>
                                        <input type="text" class="form-control" id="nuevo_cel_2" name="nuevo_cel_2">
                                    </div>

                                    <div class="form-group">
                                        <label><strong>*Profesión</strong></label>
                                        <input type="text" class="form-control" id="nuevo_profesion" name="nuevo_profesion"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Relación de dependencia</strong></label>
                                        <br>
                                        <input id="check_dependencia" onchange="validar_dependencia(this);" type="checkbox"
                                            data-style="slow" data-toggle="toggle" data-size="normal" data-on="Si"
                                            data-off="No">
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Domicilio de Empleo</strong>(Calle - N° - Departamento)</label>
                                        <input type="text" class="form-control" id="nuevo_domicilio_empleo" name="nuevo_domicilio_empleo">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Teléfono del Empleo</strong>(Celular o fijo)</label>
                                        <input type="number" class="form-control" id="nuevo_domicilio_empleo" name="nuevo_domicilio_empleo">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Antiguedad</strong></label>
                                        <input type="number" class="form-control" id="nuevo_antiguedad" name="nuevo_antiguedad"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Ingreso Mensual</strong></label>
                                        <input type="number" class="form-control" id="nuevo_ingresos_mesuales" name="nuevo_ingresos_mesuales"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Nombre de Padre</strong></label>
                                        <input type="text" class="form-control" id="nuevo_nombre_padre" name="nuevo_nombre_padre"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Nombre de Madre</strong></label>
                                        <input type="text" class="form-control" id="nuevo_nombre_madre" name="nuevo_nombre_madre"
                                            required>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <div class="box-footer">

                        <div class="box box-default">
                            <div ALIGN="left" class="box-header with-border">
                                <h4 class="box-title">¿Convive? </h4>
                                <input id="check_conyuge" onchange="validar_check_conyuge(this);" type="checkbox"
                                    data-style="slow" data-toggle="toggle" data-size="mini" data-on="Si" data-off="No">
                            </div>
                            <section id="conyuge" style="display:none" class="box box-primary">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>*DNI</strong></label>
                                            <input type="number" class="form-control" id="conyuge_dni" name="conyuge_dni">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Nombres</strong></label>
                                            <input type="text" class="form-control" id="conyuge_nombre" name="conyuge_nombre">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Apellidos</strong></label>
                                            <input type="text" class="form-control" id="conyuge_apellido" name="conyuge_apellido">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Fecha de Nacimiento</strong></label>
                                            <input type="date" class="form-control" id="conyuge_fecha_nac" name="conyuge_fecha_nac">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Celular</strong></label>
                                            <input type="text" class="form-control" id="conyuge_cel_1" name="conyuge_cel_1">
                                        </div>

                                        <div class="form-group">
                                            <label><strong>*Domicilio</strong></label>
                                            <input type="text" class="form-control" id="conyuge_domicilio" name="conyuge_domicilio">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Actividad/Empresa</strong></label>
                                            <input type="text" class="form-control" id="conyuge_act_empresa" name="conyuge_act_empresa">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Teléfono Laboral</strong>(tel. fijo o celular)</label>
                                            <input type="text" class="form-control" id="conyuge_cel_2" name="conyuge_cel_2">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">

                                        <div class="form-group">
                                            <label><strong>*Profesión</strong></label>
                                            <input type="text" class="form-control" id="conyuge_profesion" name="conyuge_profesion"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Relación de dependencia</strong></label>
                                            <br>
                                            <input id="check_dependencia" onchange="validar_dependencia(this);" type="checkbox"
                                                data-style="slow" data-toggle="toggle" data-size="normal" data-on="Si"
                                                data-off="No">
                                            <br>

                                            <div class="form-group">
                                                <label><strong>*Domicilio de Empleo</strong>(Calle - N° - Departamento)</label>
                                                <input type="text" class="form-control" id="conyuge_domicilio_empleo"
                                                    name="conyuge_domicilio_empleo">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Teléfono del Empleo</strong>(Celular o fijo)</label>
                                                <input type="number" class="form-control" id="conyuge_telefono_empleo"
                                                    name="conyuge_telefono_empleo">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Antiguedad</strong></label>
                                                <input type="number" class="form-control" id="conyuge_antiguedad" name="conyuge_antiguedad"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Ingreso Mensual</strong></label>
                                                <input type="number" class="form-control" id="conyuge_ingresos_mesuales"
                                                    name="nuevo_ingresos_mesuales" required>
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Nombre de Padre</strong></label>
                                                <input type="text" class="form-control" id="conyuge_nombre_padre" name="conyuge_nombre_padre"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Nombre de Madre</strong></label>
                                                <input type="text" class="form-control" id="conyuge_nombre_madre" name="conyuge_nombre_madre"
                                                    required>
                                            </div>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </section>
                        </div>


                        <div class="box box-default">
                            <div ALIGN="left" class="box-header with-border">
                                <h4 class="box-title">Información del Garante</h4>
                                <input id="ingarante" onchange="validar_check_garante(this);" type="checkbox"
                                    data-style="slow" data-toggle="toggle" data-size="mini" data-on="Si" data-off="No">


                            </div>
                            <section id="garante" style="display:none" class="box box-primary">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>*DNI</strong></label>
                                            <input type="number" class="form-control" id="garante_dni" name="garante_dni">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Nombres</strong></label>
                                            <input type="text" class="form-control" id="garante_nombre" name="garante_nombre">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Apellidos</strong></label>
                                            <input type="text" class="form-control" id="garante_apellido" name="garante_apellido">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Fecha de Nacimiento</strong></label>
                                            <input type="date" class="form-control" id="garante_fecha_nac" name="garante_fecha_nac">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Estado Civil</strong></label>
                                            <select id="garante_estado_civil" name="garante_estado_civil" class="form-control form-control-sm">
                                                <option>Soltero</option>
                                                <option>Convive</option>
                                                <option>Casado</option>
                                                <option>Divorciado</option>
                                                <option>Viudo</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>*Celular</strong></label>
                                            <input type="text" class="form-control" id="garante_cel_1" name="garante_cel_1">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Otro</strong>(tel. fijo o celular)</label>
                                            <input type="text" class="form-control" id="garante_cel_2" name="garante_cel_2">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label><strong>*Domicilio</strong></label>
                                                <input type="text" class="form-control" id="garante_domicilio" name="garante_domicilio">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Actividad/Empresa</strong></label>
                                                <input type="text" class="form-control" id="garante_act_empresa" name="garante_act_empresa">
                                            </div>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-14">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vehículo que Adquiere</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row margenBoot-25">
                            <div class="col-xs-14 col-lg-6">
                                <button onclick="enable_0km()" type="button" class="btn btn-success btn-block"
                                    data-toggle="modal" data-target="#modal-0km" style="margin-bottom: 10%;">0 KM</button>
                            </div>
                            <div class="col-xs-14 col-lg-6">
                                <button onclick="enable_usado()" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">USADO</button>
                                <input type="text" id="check_usado" name="check_usado" style="display:none">

                            </div>

                            <div class="col-xs-14 col-lg-12">
                                <section id="buscar_usados" style="display:none" value="no">
                                    <div class="container-fluid spark-screen">
                                        <div class="row">
                                            <div class="col-md-14 col-md-offset-0">
                                                <div class="box">
                                                    <div class="box-header with-border">
                                                        <div class="box-header">
                                                        </div>
                                                        <div class="box-body">
                                                            <form method="GET" action="{{ route('usados') }}" class="navbar-form pull-right"
                                                                role="search">
                                                                {{ csrf_field() }}
                                                                <div class="input-group">
                                                                    <input type="hidden" id="usado" name="usado" value="2">
                                                                    <!-- <input type="text" class="form-control" name="name" placeholder="Busqueda"> 
                                                                                <span class="input-group-btn">
                                                                                    <button type="submit" class="btn btn-default">
                                                                                        <span class="glyphicon glyphicon-search"></span>
                                                                                    </button>
                                                                                </span>
                                                                            -->
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div>
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="sorting" tabindex="0" aria-controls="example"
                                                                            rowspan="1" colspan="1" aria-label=" : activate to sort column ascending"
                                                                            style="width: 58px;" />
                                                                        <th scope="col">MARCA</th>
                                                                        <th scope="col">MODELO</th>
                                                                        <th scope="col">VERSION</th>
                                                                        <th scope="col">DOMINIO</th>
                                                                        <th scope="col">COLOR</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($auto_usado as $item)
                                                                    <tr>
                                                                        <td align="center" style="cursor: default;">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="exampleRadios" id="exampleRadios1">
                                                                            <input id="check_select_usado" name="check_select_usado"
                                                                                value='{{$item->dominio}}' style="display:none">
                                                                        </td>
                                                                        <td>{{$item->marca}}</td>
                                                                        <td>{{$item->modelo}}</td>
                                                                        <td>{{$item->descripcion}}</td>
                                                                        <td>{{$item->dominio}}</td>
                                                                        <td>{{$item->color}}</td>

                                                                        </td>
                                                                    </tr>
                                                                    @endforeach()
                                                                </tbody>
                                                            </table>

                                                            {{ $autos->render() }}
                                </section>

                                <section id="buscar_usados" name="buscar_usados" style="display:none">
                                    <select id="select_marcas" onchange="obtenervalue()" class="selectpicker"
                                        data-live-search="true" data-width="100%" data-size="2">
                                        @foreach ($nombapell as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <br><br><br><br><br><br><br>
                                    <input type="text" id="modelousado" name="modelousado" style="display:none">

                                </section>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.col -->
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Forma de Pagos</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">

                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <label><strong>Valor de Auto Vendido</strong></label>
                                                <input id="valor_auto_vendido" type="text" maxlength="150" class="form-control"
                                                    id="inp-vehiculo" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Valor de Auto Entregado</strong></label>
                                                <input type="text" maxlength="150" class="form-control" id="inp-vehiculo"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <label><strong>Contado</strong></label>
                                                <input type="text" maxlength="150" class="form-control" id="inp-contado"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <br>
                                                <label><strong>Cheque </strong></label>
                                                <input id="check_cheque" name="check_cheque" onchange="validar_check_cheque(this);"
                                                    type="checkbox" data-style="slow" data-toggle="toggle" data-size="mini"
                                                    data-on="Si" data-off="No" value="0">
                                                <input id="valor_cheque" name="valor_cheque" type="text" style="display:none;">
                                                <br>
                                                <input type="number" style="display:none;" id="inpcheques" name="inpcheques"
                                                    value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <label><strong>Financiación</strong></label>
                                                <input id="check_conyuge" onchange="validar_check_financiera(this);"
                                                    type="checkbox" data-style="slow" data-toggle="toggle" data-size="mini"
                                                    data-on="Si" data-off="No">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <label>Observaciones Financiación Externa:</label>
                                                <textarea class="form-control" id="inp-observacionesFinanciacion" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="form-group">
                                                <label><strong>Total</strong></label>
                                                <input type="text" maxlength="150" class="form-control" id="inp-total"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="alerta-nosonigualesImportes" class="row margenBoot-25 hidden">
                                        <div class="col-xs-12 col-lg-10"> </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-8">

                                    <div name="entradaAuto" class="row">
                                        <div class="col-sm-12">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" name="tituloAutoEntrega">¿Entrega Auto Usado?</h3>
                                                <input id="check_entregado" onchange="validar_entregado(this);" type="checkbox"
                                                    data-style="slow" data-toggle="toggle" data-size="mini" data-on="Si"
                                                    data-off="No">
                                                <input id="valor_entregado" name="valor_entregado" type="text" style="display:none;">

                                            </div>
                                            <!-- /.box-header -->
                                            <section id="section_usado_entregado" style="display:none">
                                                <div class="box-body">
                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label><strong>Nombre de Titular</strong></label>
                                                                <input type="text" class="form-control" id="nomb_titular_entregado"
                                                                    name="nomb_titular_entregado">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-3">
                                                            <label><strong>Patente Mercosur</strong></label>
                                                            <input id="check_patente" name="check_patente" onchange="validar_check_patente(this);"
                                                                type="checkbox" data-style="slow" data-toggle="toggle"
                                                                data-size="normal" data-on="Si" data-off="No">
                                                        </div>
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Dominio</strong></label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                    maxlength="10" class="form-control" id="dominio_entregado"
                                                                    name="dominio_entregado" name="dominio" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                <label><strong>*Marca</strong></label>
                                                                <select id="marca_entregado" name="marca_entregado"
                                                                    class="selectpicker show-tick" data-show-subtext="true"
                                                                    data-live-search="true" data-style="btn-default"
                                                                    data-width="100%">
                                                                    <option value="">Seleccionar marca</option>
                                                                    @foreach ($marcas as $item){
                                                                    <option value="{{ $item->nombre }}">{{$item->nombre}}</option>
                                                                    }
                                                                    @endforeach
                                                                </select>
                                                                <input id="marca_selec" name="marca_selec" type="text"
                                                                    style="display:none;">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Modelo</strong></label>
                                                                <input type="text" maxlength="150" class="form-control"
                                                                    id="modelo_entregado" name="modelo_entregado">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Versión</strong></label>
                                                                <input type="text" maxlength="150" class="form-control"
                                                                    id="version_entregado" name="version_entregado">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-2">
                                                            <div class="form-group">
                                                                <label><strong>Año</strong></label>
                                                                <input type="text" maxlength="65" class="form-control"
                                                                    id="anio_entregado" name="anio_entregado">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Color</strong></label>
                                                                <input type="text" maxlength="65" class="form-control"
                                                                    id="color_entregado" name="color_entregado">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-5">
                                                            <div class="form-group">
                                                                <label><strong>N° Motor</strong></label>
                                                                <input type="text" maxlength="255" class="form-control"
                                                                    id="motor_num_entregado" name="motor_num_entregado">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                <label><strong>N° Chasis</strong></label>
                                                                <input type="text" maxlength="255" class="form-control"
                                                                    id="chasis_num_entregado" name="chasis_num_entregado">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-12">
                                                            <!-- <div class="form-group">
                                                                                        <label><strong>Documentación Entregada</strong></label>
                                                                                        <textarea class="form-control" id="inp-observacion2" name="inp-observacion2[]"
                                                                                            rows="5" maxlength="21844">CÉDULA DE IDENTIFICACIÓN DEL VEHÍCULO, CÉDULA DE AUTORIZADO, VTV EN VIGENCIA, CONSTANCIA DE LIBRE DEUDA MUNICIPAL DE IMPUESTOS Y MULTAS, INFORME DE DOMINIO, F12 CONFECCIONADO POR POLICÍA O GENDARMERÍA NACIONAL CON FECHA ACTUAL, TÍTULO Y F08 DEBIDAMENTE FIRMADO.</textarea>
                                                                                        
                                                                                        </div> -->
                                                        </div>

                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- ./box-body -->
                                                <div class="box-footer" align="center">
                                                    <!--
                                                                                    <button type="button" onclick="limpiarAutoEntrega(this);" name="btn-limpiarAutoEntrega"
                                                                                        class="btn btn-sm btn-warning"> <i class="fa fa-recycle"></i>
                                                                                        LIMPIAR DATOS </button>
                                                                                    <button type="button" onclick="eliminarOpcionAuto(this);" name="btn-BorrarVehiculo"
                                                                                        class="btn btn-sm btn-danger hidden"> <i class="fa fa-minus"></i>
                                                                                        BORRAR VEHÍCULO</button>
                                                                                    <button type="button" onclick="generarNuevaOpcionVehiculo(this);"
                                                                                        name="btn-NuevoVehiculo" class="btn btn-sm btn-primary"><i
                                                                                            class="fa fa-plus"></i> AGREGAR
                                                                                        VEHÍCULO </button>
                                                                                    -->
                                                </div>
                                                <!-- /.box-footer -->
                                            </section>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <br><br>
                                    <div id="detalle_cheque" style="display:none;" class="panel panel-default">
                                        <div class="panel-body">
                                            <h3 style="margin:5px;"><small>Detalles de cheques:</small></h3>
                                            <div class="div-cheques">
                                                <div name="rows" class="row margenBoot-25">
                                                    <div class="col-xs-12 col-lg-2">
                                                        <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                        <div class="form-group">
                                                            <label><strong>Banco</strong></label>
                                                            <input id="banco" name="banco" type="text" maxlength="150"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            <label><strong>Número</strong></label>
                                                            <input id="numero_cheque" name="numero_cheque" type="int"
                                                                maxlength="65" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            <label><strong>Fecha</strong></label>
                                                            <div class="input-group date" name="date-fechaPagCheque[]">
                                                                <input id="fecha_cheque" name="fecha_cheque" type="date"
                                                                    class="form-control">
                                                                <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span>
                                                                </span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            <label><strong>Importe</strong></label>
                                                            <input id="importe_cheque" name="importe_cheque" type="text"
                                                                maxlength="65" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                        <div class="form-group">
                                                            <!--<button type="button" onclick="cheques();" name="btn-NuevoCheque"
                                                                                                class="btn btn-primary" style="margin-top:25px;">
                                                                                                <span class="glyphicon glyphicon glyphicon-plus"
                                                                                                    aria-hidden="true"></span>
                                                                                            </button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div style="margin-top:25px;">
                                <div class="col-sm-12 col-lg-12">
                                    <div id="alerta" style="display:none;" class="alert alert-success" role="alert"><strong>Operacion
                                            Guardada Correctamente!</strong></div>
                                </div>
                            </div>
                            <div class="row margenBoot-25" style="margin-top:25px;">
                                <div class="col-xs-12 col-lg-12" style="text-align:center;">
                                    <button type="submit" id="btn-guardar" data-loading-text="GUARDANDO..." class="btn btn-success"
                                        onclick="">GENERAR VENTA</button>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <!--Modal Financiera-->

            <div class="modal fade" id="modal-financiera" tabindex="-1" role="dialog" aria-labelledby="modal-financiera"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">×</font>
                                    </font>
                                </span></button>
                            <h4 class="modal-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">FINANCIERAS</font>

                                </font>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label><strong>Cantidad de Cuotas</strong></label>
                                <input type="number" class="form-control" id="cant_cuotas" name="cant_cuotas" required>
                            </div>
                            <div class="form-group">
                                <label><strong>Monto de Cuota</strong></label>
                                <input type="number" class="form-control" id="monto" name="monto" required>
                            </div>
                            <div class="form-group">
                                <label><strong>Resto</strong></label>
                                <input type="number" class="form-control" id="resto_financ" name="resto_financ"
                                    required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <a onclick="verificar();" class="btn btn-primary">Continuar</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!--Modal 0KM-->
            <div class="modal fade" id="modal-0km" tabindex="-1" role="dialog" aria-labelledby="modal-0km" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">×</font>
                                    </font>
                                </span></button>
                            <h4 class="modal-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Cargar 0 KM </font>
                                </font>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <ul class="nav nav-tabs">
                                <li id="stock" class="active"><a data-toggle="tab" href="#home">STOCK/DEPOSITO</a></li>
                                <li id="lista"><a data-toggle="tab" href="#menu1">LISTA DE AUTOS</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <br>


                                    <div class="box-body">

                                        <form method="GET" action="{{ route('autos.index') }}" class="navbar-form pull-right"
                                            role="search">

                                            <div class="input-group">

                                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                <input type="text" class="form-control" name="name" placeholder="Busqueda">
                                                <input type="hidden" id="dato" name="dato" value="nuevo">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>



                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label=" : activate to sort column ascending" style="width: 58px;" />
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1" aria-label=" : activate to sort column ascending" style="width: 58px;" />
                                                <th scope="col">MARCA</th>
                                                <th scope="col">MODELO</th>
                                                <th scope="col">VERSION</th>
                                                <th scope="col">COLOR</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($autos as $item)
                                            <tr>
                                                <p></p>
                                                <td align="center" style="cursor: default;">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios1">
                                                    <input id="select_cero" name="select_cero" value='{{$item->id_autocero}}'
                                                        style="display:none">
                                                </td>
                                                <td align="center" style="cursor: default;">
                                                    <img src={{url("img/marcas/$item->nombre.jpg")}} alt="..." class="img-circle"
                                                        style="width: 30px; height: 30px;" />
                                                </td>
                                                <td>{{$item->nombre}}</td>
                                                <td>{{$item->modelo}}</td>
                                                <td>{{$item->descripcion}}</td>
                                                <td>{{$item->color}}</td>

                                            </tr>
                                            @endforeach()
                                        </tbody>
                                    </table>

                                    {{ $autos->render() }}

                                    <input type="text" id="estado_toggle" name="estado_toggle" style="display:none">


                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <br>
                                    <div class="row margenBoot-25">
                                        <div class="col-xs-12 col-lg-12">
                                            <section id="modal_cargar0km" style="display:block">
                                                <a href="url">Ver Listas</a>
                                                <div class="form-group">
                                                    <br>
                                                    <select id="marca" name="marca" class="form-control form-control-sm">
                                                        @foreach ($marcas as $item)
                                                        <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Modelo</strong></label>
                                                    <input type="text" class="form-control" id="modelo" name="modelo">
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Versión</strong></label>
                                                    <input type="text" class="form-control" id="version" name="version">
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Precio</strong></label>
                                                    <input type="text" class="form-control" id="precio" name="precio">
                                                </div>
                                            </section>
                                            <!--<button onclick="viñeta_0km_cargado();" class="btn btn-primary"> Guardar </button> -->
                                            <section id="auto_cargado" style="display:none">
                                                <p>Auto Guardado</p>
                                            </section>
                                        </div>

                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button onclick="viñeta_0km();" class="btn btn-primary" data-dismiss="modal">Continuar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Fin Modal 0KM-->

    </form>

</div>

<script>
    function verificar() {

        if ($('#cant_cuotas').val().length != 0 && $('#monto').val().length != 0 &&
            $('#resto_financ').val().length != 0) {
            $('#modal-financiera').modal('hide');

        }
    }
</script>
@endsection