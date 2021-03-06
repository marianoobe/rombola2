@extends('adminlte::layouts.app')

@section('seccion')
<meta name="csrf-token" content="<?= csrf_token() ?>">
</meta>
{!! Html::script('js/venta.js') !!}
{!! Html::style('css/venta.css') !!}

 <style>
    
 </style>

<div class="container-fluid spark-screen">

    <!-- Seccion Cabecera -->

    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div align="center">
                        <h3 class="box-title">Inicio de Operación</h3>
                    </div>

                    <div class="box-tools pull-right">
                        <a class="btn btn-xs btn-success" onclick="history.back(1);">
                            <i class="fa fa-chevron-left"></i> VOLVER</a>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
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
                                    <input type="text" value="{{$fecha}}" disabled>
                                    <input type="text" style="display:none" id="fecha_oper"
                                        name="fecha_oper" value="{{$fecha}}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-offset-2 col-lg-3">
                            <input type="text" maxlength="125" id="nom_vendedor"
                                disabled="disabled" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="col-xs-12 col-lg-12">
                            <hr>
                        </div>

                        <div id="alert_cliente" class="form-group text-danger" style="display:none">
                            <label><strong>*campos incompletos</strong></label>
                        </div>

                        <div class="col-xs-12 col-lg-4 text-center">
                            <div class="form-group">
                                <i id="inf_circle" class="far fa-circle fa-2x" style="display:block;color:green"></i>
                                <i id="inf_circle_check" class="fas fa-check-circle fa-2x "
                                    style="display:none;color:green"></i>
                                <h5>Información del Cliente</h5>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 text-center">
                            <div class="form-group">
                                <i id="adq_circle" class="far fa-circle fa-2x" style="display:block;color:green"></i>
                                <i id="adq_circle_check" class="fas fa-check-circle fa-2x "
                                    style="display:none;color:green"></i>
                                <h5>Vehículo que Adquiere</h5>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 text-center">
                            <div class="form-group">
                                <i id="pago_circle" class="far fa-circle fa-2x" style="display:block;color:green"></i>
                                <i id="pago_circle_check" class="fas fa-check-circle fa-2x "
                                    style="display:none;color:green"></i>
                                <h5>Forma de Pago</h5>
                            </div>
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

    <!-- Seccion Clientes -->

    <input type="text" id="nya_client_pago" name="nya_client_pago" style="display:none">
    <div class="row" id="box1" name="box1">
        <div class="col-md-14 col-md-offset-0">
            <div class="box box-primary">
                <div ALIGN="center" class="box-header with-border">
                    <h5 class="box-title">Información del Cliente</h5>
                </div>

                <div class="box-body">
                    <input type="text" id="id_user" name="id_user" style="display:none" value="{{ Auth::user()->id }}">
                    <input type="text" id="cancer" name="cancer" style="display:none" value="not_select">
                    <input type="text" id="tipodni" name="tipodni" style="display:none">
                    <input type="text" id="nya_cliente" name="nya_cliente" style="display:none">


                    <div class="row margenBoot-25">
                        <div class="col-xs-14 col-lg-6">
                            <h4 style="color:black">Buscar Cliente</h4>
                            <section id="buscar">
                                <select id="dnis" onchange="obtener_cliente_buscado()" class="selectpicker"
                                    data-live-search="true" data-width="100%" data-size="4">
                                    <option>Seleccione nombre</option>
                                    @foreach ($nombapell as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                    @endforeach

                                </select>

                            </section>
                            <div class="col-xs-12 col-lg-6">
                                <img id="cargando" style="display:none;" src="/img/cargando.gif"></img>

                                <div id="alert_completa" style="display:none;" role="alert">
                                    <h5 style="color:green;">*Ficha Completa</h5>
                                </div>
                                <div id="alert_incompleta" style="display:none;" role="alert">
                                    <a href="#" onclick="modal_edit();" data-toggle="modal"
                                        data-target="#modal-clienteNuevo">
                                        <h5 style="color:red;">*Debe completar Ficha de Cliente</h5>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row margenBoot-25">
                        <div class="col-xs-14 col-lg-6">
                            <h4 style="color:black">¿Cliente Nuevo?</h4>
                            <input id="check_cheque" name="check_cheque" onchange="enable_nuevo_financ(this);"
                                type="checkbox" data-style="slow" data-toggle="toggle" data-size="small" data-on="Si"
                                data-off="No" value="0">
                            <br><br>
                        </div>
                    </div>
                    <div class="row margenBoot-25">

                        <section id="nuevo" style="display:none">

                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label><strong>*DNI</strong></label>
                                    <input type="number" id="nuevo_dni" name="nuevo_dni">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Nombres</strong></label>
                                    <input type="text" id="nuevo_nombre" name="nuevo_nombre">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Apellidos</strong></label>
                                    <input type="text" id="nuevo_apellido" name="nuevo_apellido">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Fecha de Nacimiento</strong></label>
                                    <input type="date" id="nuevo_fecha_nac" name="nuevo_fecha_nac">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Estado Civil</strong></label>
                                    <select id="nuevo_estado_civil" name="nuevo_estado_civil"
                                        class="form-control form-control-sm">
                                        <option>Soltero</option>
                                        <option>Convive</option>
                                        <option>Casado</option>
                                        <option>Divorciado</option>
                                        <option>Viudo</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>*Correo Electrónico</strong></label>
                                    <input type="email" placeholder="email@gmail.com"
                                        id="nuevo_email" name="nuevo_email">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Celular</strong></label>
                                    <input type="text" id="nuevo_cel_1" name="nuevo_cel_1">
                                </div>

                                <div class="form-group">
                                    <label><strong>*Domicilio </strong>(Calle - N° - Departamento)</label>
                                    <input type="text" id="nuevo_domicilio" name="nuevo_domicilio">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Actividad/Empresa</strong></label>
                                    <input type="text" id="nuevo_act_empresa"
                                        name="nuevo_act_empresa">
                                </div>

                            </div>
                            <div class="col-xs-12 col-lg-6">

                                <div class="form-group">
                                    <label><strong>*Profesión</strong></label>
                                    <input type="text" id="nuevo_profesion" name="nuevo_profesion">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label><strong>*Relación de dependencia</strong></label>
                                    <br>
                                    <input id="check_dependencia" onchange="validar_dependencia(this);" type="checkbox"
                                        data-style="slow" data-toggle="toggle" data-size="normal" data-on="Si"
                                        data-off="No">
                                    <input id="check_dependencia" name="check_dependencia" type="number"
                                        style="display:none;" value="0">

                                    <br>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Domicilio de Empleo</strong>(Calle - N° - Departamento)</label>
                                    <input type="text" id="nuevo_domicilio_empleo"
                                        name="nuevo_domicilio_empleo">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Teléfono del Empleo</strong>(celular o fijo)</label>
                                    <input type="number" id="telefono_laboral"
                                        name="telefono_laboral">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Antiguedad</strong></label>
                                    <input type="number" id="nuevo_antiguedad"
                                        name="nuevo_antiguedad">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Ingreso Mensual</strong></label>
                                    <input type="number" id="nuevo_ingresos_mesuales"
                                        name="nuevo_ingresos_mesuales">
                                </div>
                                <div class="input-group">
                                    <label><strong>*Otros ingresos</strong></label>
                                    <input type="number" id="otros_ingresos"
                                        name="nuevo_otros_ingresos">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Nombre de Padre</strong></label>
                                    <input type="text" id="nuevo_nombre_padre"
                                        name="nuevo_nombre_padre">
                                </div>
                                <div class="form-group">
                                    <label><strong>*Nombre de Madre</strong></label>
                                    <input type="text" id="nuevo_nombre_madre"
                                        name="nuevo_nombre_madre">
                                </div>
                            </div>

                        </section>
                    </div>

                    <div class="box-footer">

                        <div class="box box-default">
                            <div ALIGN="left" class="box-header with-border">
                                <h4 class="box-title">¿Convive? </h4>
                                <input id="check_conyuge" onchange="validar_check_conyuge_financ(this);" type="checkbox"
                                    data-style="slow" data-toggle="toggle" data-size="mini" data-on="Si" data-off="No">
                                <input id="input_conyuge" name="input_conyuge" type="text" style="display:none"
                                    value="no">

                            </div>
                            <section id="conyuge" style="display:none" class="box box-primary">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>*DNI</strong></label>
                                            <br>
                                            <input type="number" id="conyuge_dni"
                                                name="conyuge_dni">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Nombres</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_nombre"
                                                name="conyuge_nombre">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Apellidos</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_apellido"
                                                name="conyuge_apellido">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Fecha de Nacimiento</strong></label>
                                            <br>
                                            <input type="date" id="conyuge_fecha_nac"
                                                name="conyuge_fecha_nac">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Celular</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_cel_1"
                                                name="conyuge_cel_1">
                                        </div>

                                        <div class="form-group">
                                            <label><strong>*Domicilio</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_domicilio"
                                                name="conyuge_domicilio">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Actividad/Empresa</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_act_empresa"
                                                name="conyuge_act_empresa">
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-lg-6">

                                        <div class="form-group">
                                            <label><strong>*Profesión</strong></label>
                                            <br>
                                            <input type="text" id="conyuge_profesion"
                                                name="conyuge_profesion">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Relación de dependencia</strong></label>
                                            <br>
                                            <input id="check_dependencia" onchange="validar_dependencia(this);"
                                                type="checkbox" data-style="slow" data-toggle="toggle"
                                                data-size="normal" data-on="Si" data-off="No">
                                            <input id="check_dependencia" name="check_dependencia" type="number"
                                                style="display:none;" value="0">

                                            <br>

                                            <div class="form-group">
                                                <label><strong>*Domicilio de Empleo</strong>(Calle - N° -
                                                    Departamento)</label>
                                                    <br>
                                                <input type="text" id="conyuge_domicilio_empleo"
                                                    name="conyuge_domicilio_empleo">
                                            </div>

                                            <div class="form-group">
                                                <label><strong>*Teléfono del Empleo</strong>(Celular o fijo)</label>
                                                <br>
                                                <input type="number" id="conyuge_telefono_trabajo"
                                                    name="conyuge_telefono_trabajo">
                                            </div>


                                            <div class="form-group">
                                                <label><strong>*Antiguedad</strong></label>
                                                <br>
                                                <input type="number" id="conyuge_antiguedad"
                                                    name="conyuge_antiguedad">
                                            </div>

                                            <div class="form-group">
                                                <label><strong>*Ingreso Mensual</strong></label>
                                                <br>
                                                <input type="number"
                                                    id="conyuge_ingresos_mensuales" name="conyuge_ingresos_mensuales">
                                            </div>

                                            <div class="form-group">
                                                <label><strong>*Nombre de Padre</strong></label>
                                                <br>
                                                <input type="text" id="conyuge_nombre_padre"
                                                    name="conyuge_nombre_padre">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>*Nombre de Madre</strong></label>
                                                <br>
                                                <input type="text" id="conyuge_nombre_madre"
                                                    name="conyuge_nombre_madre">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Seccion Vehiculos -->

    <div class="row" id="box2" name="box2">
        <div class="col-sm-14">
            <div class="box box-primary">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Vehículo que Adquiere</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row margenBoot-25">
                        <div class="col-xs-14 col-lg-6">
                            <button id="btn-0km" onclick="enable_0km()" type="button" class="btn btn-success btn-block"
                                data-toggle="modal" data-target="#modal-0km" style="margin-bottom: 10%;">0 KM</button>
                        </div>
                        <div class="col-xs-14 col-lg-6">
                            <button id="btn-usado" onclick="enable_usado()" type="button" class="btn btn-success btn-block"
                                style="margin-bottom: 10%;">USADO</button>
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
                                                        <form method="GET" action="{{ route('usados') }}"
                                                            class="navbar-form pull-right" role="search">
                                                            {{ csrf_field() }}
                                                            <div class="input-group">
                                                                <input type="hidden" id="usado" name="usado" value="2">
                                                                <!-- <input type="text" name="name" placeholder="Busqueda"> 
                                                                                    <span class="input-group-btn">
                                                                                        <button type="submit" class="btn btn-default">
                                                                                            <span class="glyphicon glyphicon-search"></span>
                                                                                        </button>
                                                                                    </span>
                                                                                -->
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div id="div2_usados">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="example" rowspan="1" colspan="1"
                                                                        aria-label=" : activate to sort column ascending"
                                                                        style="width: 58px;" />
                                                                    <th scope="col"></th>
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
                                                                        <input class="form-check-input check_usado" type="radio"
                                                                            name="exampleRadios" id="exampleRadios">
                                                                        <input id="check_select_usado"
                                                                            name="check_select_usado"
                                                                            value='{{$item->dominio}}'
                                                                            style="display:none">
                                                                            <input id="check_select_modelo"
                                                                            name="check_select_modelo"
                                                                            value='{{$item->modelo}}'
                                                                            style="display:none">
                                                                            <input id="check_select_version"
                                                                            name="check_select_version"
                                                                            value='{{$item->version}}'
                                                                            style="display:none">
                                                                    </td>
                                                                    <td align="center" style="cursor: default;">
                                                                        <img src={{url("img/marcas/$item->nombre.jpg")}}
                                                                            alt="..." class="img-circle"
                                                                            style="width: 30px; height: 30px;" />
                                                                    </td>
                                                                    <td>{{$item->nombre}}</td>
                                                                    <td>{{$item->modelo}}</td>
                                                                    <td>{{$item->version}}</td>
                                                                    <td>{{$item->dominio}}</td>
                                                                    <td>{{$item->color}}</td>

                                                                    </td>
                                                                </tr>
                                                                @endforeach()

                                                            </tbody>
                                                        </table>

                            </section>

                        </div>

                        <div id="car-delete" class="col-xs-14 col-lg-6" style="display:none">
                        <div class="small-box bg-red">
                            <div class="inner">
                              <p id="car-text"></p>
                            </div>
                            <a onclick="delete_car();" class="small-box-footer">
                              Eliminar Auto <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>

    <!-- Seccion Forma de Pago -->

    <div class="row" id="box3" name="box3">
        <div class="col-sm-14">
            <div class="box box-primary">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Forma de Pago</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
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
                                        <br>
                                        <input type="text" id="valor_auto_vendido" name="valor_auto_vendido"
                                            maxlength="30" required value="0">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><strong>Valor de Auto Entregado</strong></label>
                                        <br>
                                        <input type="text" id="valor_auto_entregado" name="valor_auto_entregado"
                                            maxlength="30" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-10">
                                    <div class="form-group">
                                        <label><strong>Contado/Efectivo</strong></label>
                                        <br>
                                        <input type="text" id="inpefectivo" name="inpefectivo" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><strong>Saldo Neto</strong></label>
                                        <br>
                                        <input type="text" id="saldo_neto" name="saldo_neto" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-10">
                                    <div class="form-group">
                                        <label><strong>Cheque </strong></label>
                                        <br>
                                        <input id="check_cheque" name="check_cheque"
                                            onchange="validar_check_cheque(this);" type="checkbox" data-style="slow"
                                            data-toggle="toggle" data-size="mini" data-on="Si" data-off="No" value="0">
                                        <input id="valor_cheque" name="valor_cheque" type="text" style="display:none;">
                                        <br>
                                        <input type="text" style="display:none;" id="inpcheques" name="inpcheques"
                                            value="0">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <hr>
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-10">
                                    <div class="form-group">
                                        <label>Observaciones Financiación Externa:</label>
                                        <br>
                                        <textarea id="inp-observacionesFinanciacion"
                                            rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-10">
                                    <div class="form-group">
                                        <label><strong>Total</strong></label>
                                        <br>
                                        <input type="text" maxlength="150" id="inp-total"
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
                                        <input id="valor_entregado" name="valor_entregado" type="text"
                                            style="display:none;">

                                    </div>
                                    <!-- /.box-header -->
                                    <section id="section_usado_entregado" style="display:none">
                                        <div class="box-body">
                                            <div class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-6">
                                                    @php
                                                    $fecha = date("d-m-Y");
                                                    @endphp
                                                    <input type="text" style="display:none"
                                                        id="fecha_ingreso" name="fecha_ingreso" value="{{$fecha}}" />
                                                    <div class="form-group">
                                                        <label><strong>Nombre de Titular</strong></label>
                                                        <br>
                                                        <input type="text"
                                                            id="nomb_titular_entregado" name="nomb_titular_entregado">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-3">
                                                    <label><strong>Patente Mercosur</strong></label>
                                                    <br>
                                                    <input id="check_patente" name="check_patente"
                                                        onchange="validar_check_patente(this);" type="checkbox"
                                                        data-style="slow" data-toggle="toggle" data-size="normal"
                                                        data-on="Si" data-off="No">
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Dominio</strong></label>
                                                        <br>
                                                        <input type="text" style="text-transform: uppercase;"
                                                            maxlength="10" id="dominio_entregado"
                                                            name="dominio_entregado" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label><strong>*Marca</strong></label>
                                                        <br>
                                                        <select id="marca_entregado" name="marca_entregado"
                                                            class="selectpicker show-tick" data-show-subtext="true"
                                                            data-live-search="true" data-style="btn-default"
                                                            data-width="100%">
                                                            <option value="">Seleccionar marca</option>
                                                            @foreach ($marcas as $item){
                                                            <option value="{{ $item->nombre }}">{{$item->nombre}}
                                                            </option>
                                                            }
                                                            @endforeach
                                                        </select>
                                                        <input id="marca_selec" name="marca_selec" type="text"
                                                            style="display:none;" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Modelo</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="150"
                                                            id="modelo_entregado" name="modelo_entregado">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Versión</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="150"
                                                            id="version_entregado" name="version_entregado">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        <label><strong>Año</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="65"
                                                            id="anio_entregado" name="anio_entregado">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Color</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="65"
                                                            id="color_entregado" name="color_entregado">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-5">
                                                    <div class="form-group">
                                                        <label><strong>N° Motor</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="255"
                                                            id="motor_num_entregado" name="motor_num_entregado">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label><strong>N° Chasis</strong></label>
                                                        <br>
                                                        <input type="text" maxlength="255"
                                                            id="chasis_num_entregado" name="chasis_num_entregado">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-12">
                                                    <!-- <div class="form-group">
                                                                                                <label><strong>Documentación Entregada</strong></label>
                                                                                                <textarea id="inp-observacion2" name="inp-observacion2[]"
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
                                                    <br>
                                                    <input id="banco0" name="banco0" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <br>
                                                    <input id="numero_cheque0" name="numero_cheque0" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque0" name="fecha_cheque0" type="date"
                                                        >
                                                         </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <br>
                                                    <input id="importe_cheque0" name="importe_cheque0" type="text"
                                                        maxlength="65" class="monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques();" name="btn-NuevoCheque"
                                                        class="btn btn-primary" style="margin-top:25px;">
                                                        <span class="fa fa-plus-circle fa-lg" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques1" id="div-cheques1" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco1" name="banco1" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <br>
                                                    <input id="numero_cheque1" name="numero_cheque1" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque1" name="fecha_cheque1" type="date"
                                                        >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque1" name="importe_cheque1" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(1);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques2" id="div-cheques2" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco2" name="banco2" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque2" name="numero_cheque2" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque2" name="fecha_cheque2" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque2" name="importe_cheque2" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(2);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques3" id="div-cheques3" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco3" name="banco3" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque3" name="numero_cheque3" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque3" name="fecha_cheque3" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque3" name="importe_cheque3" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(3);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques4" id="div-cheques4" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco4" name="banco4" type="text" maxlength="150"
                                                        class="form-control monto_cheque" onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque4" name="numero_cheque4" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque4" name="fecha_cheque4" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque4" name="importe_cheque4" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(4);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques5" id="div-cheques5" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco5" name="banco5" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque5" name="numero_cheque5" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque5" name="fecha_cheque5" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque5" name="importe_cheque5" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(5);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques6" id="div-cheques6" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco6" name="banco6" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque6" name="numero_cheque6" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque6" name="fecha_cheque6" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque6" name="importe_cheque6" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(6);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="div-cheques7" id="div-cheques7" style="display:none;">
                                        <div name="rows" class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-2">
                                                <input id="idCheques" name="idCheques" type="hidden" value="0">
                                                <div class="form-group">
                                                    <label><strong>Banco</strong></label>
                                                    <input id="banco7" name="banco7" type="text" maxlength="150"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Número</strong></label>
                                                    <input id="numero_cheque7" name="numero_cheque7" type="int"
                                                        maxlength="65">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Fecha</strong></label>
                                                    <div class="input-group date" name="date-fechaPagCheque[]">
                                                        <input id="fecha_cheque7" name="fecha_cheque7" type="date"
                                                        >
                                                        <span class="input-group-addon"> <span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-3">
                                                <div class="form-group">
                                                    <label><strong>Importe</strong></label>
                                                    <input id="importe_cheque7" name="importe_cheque7" type="text"
                                                        maxlength="65" class="form-control monto_cheque"
                                                        onkeyup="sumar();">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                <div class="form-group">
                                                    <button type="button" onclick="cheques_minus(7);"
                                                        name="btn-NuevoCheque" class="btn btn-danger"
                                                        style="margin-top:25px;">
                                                        <span class="fa fa-minus-circle fa-xs"
                                                            aria-hidden="true"></span>
                                                    </button>
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
                            <div id="alerta" style="display:none;" class="alert alert-success" role="alert">
                                <strong>Operacion
                                    Guardada Correctamente!</strong></div>
                        </div>
                    </div>
                    <div class="row margenBoot-25" style="margin-top:25px;">
                        <div class="col-xs-12 col-lg-12" style="text-align:center;">
                            <a onclick="next_register_pago(1);" id="btn-guardar" data-loading-text="GUARDANDO..."
                                class="btn btn-lg btn-success" onclick="">GENERAR VENTA</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>


</div>





<!--Modal -->
<div class="modal fade" id="modal-clienteNuevo" tabindex="-1" role="dialog" aria-labelledby="modal-clienteNuevo"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">×</font>
                        </font>
                    </span></button>
                <h4 class="modal-title">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">NUEVO CLIENTE</font>
                        <h6 style="vertical-align: inherit;">*campos obligatorios</h6>
                    </font>
                </h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="number" id="id_user" name="id_user" style="display:none"
                        value="{{ Auth::user()->id }}">
                    <div class="row margenBoot-25">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label><strong>*DNI</strong></label>
                                <input type="text" id="dni" name="dni" required>
                            </div>
                            <div class="form-group">
                                <label><strong>*Nombres</strong></label>
                                <input type="text" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label><strong>*Apellidos</strong></label>
                                <input type="text" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label><strong>*Correo Electrónico</strong></label>
                                <input type="email" placeholder="email@gmail.com" id="email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label><strong>*Celular</strong></label>
                                <input type="text" id="cel_1" name="cel_1" required>
                            </div>

                            <div class="form-group">
                                <label><strong>Otro (opcional)</strong></label>
                                <input type="text" id="cel_2" name="cel_2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label><strong>*Actividad/Empresa</strong></label>
                                <input type="text" id="act_empresa" name="act_empresa" required>
                            </div>

                            <div class="form-group">
                                <label><strong>*Fecha de Nacimiento</strong></label>
                                <input type="date" id="fecha_nac" name="fecha_nac" required>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label><strong>*Domicilio</strong></label>
                                    <input type="text" id="domicilio" name="domicilio" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Estado Civil</strong></label>
                                    <select id="estado_civil" name="estado_civil" class="form-control form-control-sm">
                                        <option>Soltero</option>
                                        <option>Convive</option>
                                        <option>Casado</option>
                                        <option>Divorciado</option>
                                        <option>Viudo</option>
                                    </select>
                                </div>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <a href="#" onclick="update_modal();" class="btn btn-primary" role="button">Guardar</a>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<!--Modal 0KM-->
<div class="modal fade" id="modal-0km" tabindex="-1" role="dialog" aria-labelledby="modal-0km" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
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

                                    <input type="text" name="name" placeholder="Busqueda">
                                    <input type="hidden" id="dato" name="dato" value="nuevo">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>


                        <div id="div1_nuevos">
                            <table class="table table-striped">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label=" : activate to sort column ascending"
                                                style="width: 58px;" />
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label=" : activate to sort column ascending"
                                                style="width: 58px;" />
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
                                                <input class="form-check-input check" type="radio" name="radios_0km"
                                                    id="radios_0km">
                                                <input id="select_cero" name="select_cero"
                                                    value='{{$item->id_autocero}}' style="display:none">
                                                    <input id="select_version" name="select_version"
                                                    value='{{$item->version}}' style="display:none">
                                                    <input id="select_modelo" name="select_modelo"
                                                    value='{{$item->modelo}}' style="display:none">
                                            </td>
                                            <td align="center" style="cursor: default;">
                                                <img src={{url("img/marcas/$item->nombre.jpg")}} alt="..."
                                                    class="img-circle" style="width: 30px; height: 30px;" />
                                            </td>

                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->modelo}}</td>
                                            <td>{{$item->version}}</td>
                                            <td>{{$item->color}}</td>

                                        </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                        </div>
                        <input type="text" id="estado_toggle" name="estado_toggle" style="display:none" value="null">


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
                                        <input type="text" id="modelo" name="modelo">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Versión</strong></label>
                                        <input type="text" id="version" name="version">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Precio</strong></label>
                                        <input type="text" id="precio" name="precio">
                                    </div>
                                    <div id="alert" class="form-group text-danger" style="display:none">
                                        <label><strong>*campos incompletos</strong></label>
                                    </div>
                                </section>

                                <section id="auto_cargado" style="display:none">
                                    <p>Auto Guardado</p>
                                </section>
                            </div>

                        </div><!-- /.modal-dialog -->
                    </div>
                </div>

                <div class="modal-footer">
                    <button onclick="viñeta_0km();" class="btn btn-primary">Continuar</button>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection