@extends('adminlte::layouts.app')

@role('vendedor')

@section('seccion1')
<div class="container-fluid spark-screen">
    {!! Form::open(['route'=>'pre-venta.store','method'=>'post','class'=>'form-group']) !!}
    {!! Html::script('js/financiera.js') !!}
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inicio de Operación</h3>

                    <div class="box-tools pull-right">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-offset-2 col-lg-3">
                            <div class="form-group">
                                <div class='input-group date'>
                                    <input type="text" class="form-control" id="fecha_oper" name="fecha_oper" 
                                    value="<?php echo date("d-m-Y");?>" disabled>
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

                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                aria-controls="pills-home" aria-selected="true">Buscar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Nuevo</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div aling="center" class="form-group">
                                <br> </br>
                                <input type="number" class="form-control" id="buscar_cliente" name="buscar_cliente"
                                    placeholder="Ingrese DNI">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                                <div class="panel-body">
                                    <!-- inicio panel filtros -->

                                    <div class="box-body">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="row margenBoot-25">
                                            <div class="col-xs-12 col-lg-6">
                                                <div class="form-group">
                                                    <label><strong>*DNI</strong></label>
                                                    <input type="number" class="form-control" id="dni" name="dni"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Nombres</strong></label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Apellidos</strong></label>
                                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Fecha de Nacimiento</strong></label>
                                                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Estado Civil</strong></label>
                                                    <select id="estado_civil" name="estado_civil" class="form-control form-control-sm"
                                                        required>
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
                                                    <label><strong>*Correo Electrónico</strong></label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="email@gmail.com" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>*Celular</strong></label>
                                                    <input type="text" class="form-control" id="cel_1" name="cel_1"
                                                        required> </div>
                                                <div class="form-group">
                                                    <label><strong>Otro</strong>(tel. fijo o celular)</label>
                                                    <input type="text" class="form-control" id="cel_2" name="cel_2">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label><strong>*Domicilio</strong></label>
                                                        <input type="text" class="form-control" id="domicilio" name="domicilio"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><strong>*Actividad/Empresa</strong></label>
                                                        <input type="text" class="form-control" id="act_empresa" name="act_empresa"
                                                            required>
                                                    </div>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                        <div class="modal-footer">
                                            <button type="submit" onclick="realizaProceso($('#estado_civil').val())"
                                                class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>

                                    <!-- fin panel filtros -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="box-footer">

                    <div class="box box-primary">
                        <div ALIGN="left" class="box-header with-border">
                            <h4 class="box-title">¿Convive?</h4>
                            <label><input type="checkbox" value="" onclick="javascript:validar_check_venta(this);"> Si</label>
                        </div>
                        <section id="conyuge" style="display:none" class="box box-default">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row margenBoot-25">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>*DNI</strong></label>
                                        <input type="number" class="form-control" id="dni" name="dni" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Nombres</strong></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Apellidos</strong></label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Fecha de Nacimiento</strong></label>
                                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                            required>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label><strong>*Celular</strong></label>
                                        <input type="text" class="form-control" id="cel_1" name="cel_1" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Otro</strong>(tel. fijo o celular)</label>
                                        <input type="text" class="form-control" id="cel_2" name="cel_2">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label><strong>*Domicilio</strong></label>
                                            <input type="text" class="form-control" id="domicilio" name="domicilio"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>*Actividad/Empresa</strong></label>
                                            <input type="text" class="form-control" id="act_empresa" name="act_empresa"
                                                required>
                                        </div>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div>
                        </section>
                    </div>


                    <div class="box box-primary">
                        <div ALIGN="left" class="box-header with-border">
                            <h4 class="box-title">Información del Garante</h4>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row margenBoot-25">
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label><strong>*DNI</strong></label>
                                    <input type="number" class="form-control" id="dni" name="dni" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Nombres</strong></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Apellidos</strong></label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Fecha de Nacimiento</strong></label>
                                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>*Estado Civil</strong></label>
                                    <select id="estado_civil" name="estado_civil" class="form-control form-control-sm"
                                        required>
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
                                    <input type="text" class="form-control" id="cel_1" name="cel_1" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Otro</strong>(tel. fijo o celular)</label>
                                    <input type="text" class="form-control" id="cel_2" name="cel_2">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><strong>*Domicilio</strong></label>
                                        <input type="text" class="form-control" id="domicilio" name="domicilio"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>*Actividad/Empresa</strong></label>
                                        <input type="text" class="form-control" id="act_empresa" name="act_empresa"
                                            required>
                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div>
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
                            <button type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">0 KM</button>
                        </div>
                        @php
                        $p=0;
                        @endphp
                        <div class="col-xs-14 col-lg-6">
                            <button onclick="cambiar($p)" type="button" class="btn btn-success btn-block" style="margin-bottom: 10%;">USADO</button>
                        </div>
                        @if ($p==1)
                        @include('adminlte::layouts.partials.create-0km')
                        @endif
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Forma de Pago</h3>

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
                                            <label><strong>Seña</strong></label>
                                            <input type="text" maxlength="150" class="form-control" id="inp-senna"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-10">
                                        <div class="form-group">
                                            <label><strong>Valor de Auto que entrega</strong></label>
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
                                            <label><strong>Cheques</strong></label>
                                            <input type="text" maxlength="150" class="form-control" id="inp-cheques"
                                                placeholder="$">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margenBoot-25 hidden">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label><strong>Cheque</strong></label>
                                            <span class="tag label label-success"> <span>1312</span> <a><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                                            </span> <span class="tag label label-success"> <span>1312</span> <a><i
                                                        class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                                            </span> <span class="tag label label-success"> <span>1312</span> <a><i
                                                        class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                                            </span> <span class="tag label label-success"> <span>1312</span> <a><i
                                                        class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                                            </span> </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary" onclick="openModal();" style="margin-top:25px;">
                                                <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-10">
                                        <div class="form-group">
                                            <label><strong>Financiacion Propia</strong></label>
                                            <input type="text" maxlength="150" class="form-control" id="inp-aFinanciar"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margenBoot-25">
                                    <div class="col-xs-12 col-lg-10">
                                        <div class="form-group">
                                            <label><strong>Financiación Externa</strong></label>
                                            <input type="text" maxlength="150" class="form-control" id="inp-aFinanciarExterna"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
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
                                <div id="contenedorVehiculosEntrega">
                                    <div name="entradaAuto" class="row">
                                        <div class="col-sm-12">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title" name="tituloAutoEntrega">Datos del auto
                                                        que
                                                        entrega :</h3>

                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                                class="fa fa-minus"></i></button>
                                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label><strong>Nombre de Titular</strong></label>
                                                                <input type="text" class="form-control" id="nomb_titular">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-3">
                                                            {!! Html::script('js/venta.js') !!}
                                                            <div class="form-group">
                                                                <label><strong>Patente Mercosur</strong></label>
                                                                <div class="btn-group btn-toggle">
                                                                    <button class="btn btn-xs btn-default">SI</button>
                                                                    <button class="btn btn-xs btn-success">NO</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Dominio</strong></label>
                                                                <input type="text" style="text-transform: uppercase;"
                                                                    maxlength="10" class="form-control" id="inp-dominio2"
                                                                    name="inp-dominio2[]" placeholder="" data-toggle="popover"
                                                                    title="Requerido" data-content="Este campo es obligatorio completar.">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Marca</strong></label>
                                                                <select onchange="verificarOtroElement(this,'');" class="form-control"
                                                                    id="sel-marca2" name="sel-marca2[]">
                                                                    <option value="BMW">BMW</option>
                                                                    <option value="CHEVROLET">CHEVROLET</option>
                                                                    <option value="CITROEN">CITROEN</option>
                                                                    <option value="DODGE">DODGE</option>
                                                                    <option value="FORD">FORD</option>
                                                                    <option value="FIAT">FIAT</option>
                                                                    <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                                                                    <option value="PEUGEOT">PEUGEOT</option>
                                                                    <option value="RENAULT">RENAULT</option>
                                                                    <option value="TOYOTA">TOYOTA</option>
                                                                    <option value="SUZUKI">SUZUKI</option>
                                                                    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                                                                    <option value="Otro">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label><strong>Modelo</strong></label>
                                                                <input type="text" maxlength="150" class="form-control"
                                                                    id="inp-modelo2">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Año</strong></label>
                                                                <input type="text" maxlength="65" class="form-control"
                                                                    id="inp-anno2" name="inp-anno2[]" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label><strong>Color</strong></label>
                                                                <input type="text" maxlength="65" class="form-control"
                                                                    id="inp-color2" name="inp-color2[]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-5">
                                                            <div class="form-group">
                                                                <label><strong>N° Motor</strong></label>
                                                                <input type="text" maxlength="255" class="form-control"
                                                                    id="inp-numMotor2" name="inp-numMotor2[]"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                <label><strong>N° Chasis</strong></label>
                                                                <input type="text" maxlength="255" class="form-control"
                                                                    id="inp-numChasis2" name="inp-numChasis2[]"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row margenBoot-25">
                                                        <div class="col-xs-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label><strong>Documentación Entregada</strong></label>
                                                                <textarea class="form-control" id="inp-observacion2"
                                                                    name="inp-observacion2[]" rows="5" maxlength="21844">CÉDULA DE IDENTIFICACIÓN DEL VEHÍCULO, CÉDULA DE AUTORIZADO, VTV EN VIGENCIA, CONSTANCIA DE LIBRE DEUDA MUNICIPAL DE IMPUESTOS Y MULTAS, INFORME DE DOMINIO, F12 CONFECCIONADO POR POLICÍA O GENDARMERÍA NACIONAL CON FECHA ACTUAL, TÍTULO Y F08 DEBIDAMENTE FIRMADO.</textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- ./box-body -->
                                                <div class="box-footer" align="center">
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
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.box-footer -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3 style="margin:5px;"><small>Detalles de financiacion con documentos:</small></h3>
                                        <div id="div-cuotas">
                                            <div name="rows" class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-2">
                                                    <input id="idDocumentos" name="inp-idDocumentos[]" type="hidden"
                                                        value="0">
                                                    <div class="form-group">
                                                        <label for="inp-plazo">Cantidad:</label>
                                                        <input type="text" maxlength="150" class="form-control" name="inp-plazo[]"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="inp-montoCuota">Monto Cuota:</label>
                                                        <input type="text" maxlength="65" class="form-control" onblur="darFormato(this);"
                                                            name="inp-montoCuota[]" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="inp-vencimiento">Primer vencimiento:</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control" name="inp-vencimiento[]">
                                                            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span>
                                                            </span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group">

                                                        <button type="button" onclick="generarNuevaOpcionCuota();" name="btn-NuevaCuota"
                                                            class="btn btn-primary" style="margin-top:25px;">
                                                            <span class="glyphicon glyphicon glyphicon-plus"
                                                                aria-hidden="true"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3 style="margin:5px;"><small>Detalles de cheques:</small></h3>
                                        <div id="div-cheques">
                                            <div name="rows" class="row margenBoot-25">
                                                <div class="col-xs-12 col-lg-2">
                                                    <input id="idCheques" name="inp-idCheques[]" type="hidden" value="0">
                                                    <div class="form-group">
                                                        <label><strong>Banco</strong></label>
                                                        <input type="text" maxlength="150" class="form-control" name="inp-banco[]"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Número</strong></label>
                                                        <input type="text" maxlength="65" class="form-control" name="inp-numCheque[]"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Fecha</strong></label>
                                                        <div class="input-group date" name="date-fechaPagCheque[]">
                                                            <input type="text" class="form-control">
                                                            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span>
                                                            </span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label><strong>Importe</strong></label>
                                                        <input type="text" maxlength="65" class="form-control" name="inp-importe[]"
                                                            onblur="darFormato(this);" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-1" style="padding:0;">
                                                    <div class="form-group">
                                                        <button type="button" onclick="generarNuevaOpcionCheque();"
                                                            name="btn-NuevoCheque" class="btn btn-primary" style="margin-top:25px;">
                                                            <span class="glyphicon glyphicon glyphicon-plus"
                                                                aria-hidden="true"></span> </button>
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
                                <button type="button" id="btn-guardar" data-loading-text="GUARDANDO..." class="btn btn-success"
                                    onclick="comenzarAGuardar();">GUARDAR</button>
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
        {!! Form::close() !!}
    </div>

    @endsection

    @else
    <h3 style="margin:5px;"><small>Sal de Aqui Insecto</small></h3>
@endrole