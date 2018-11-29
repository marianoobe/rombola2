@php
use App\Operaciones;
$venta_operac = Operaciones::
join('ventas','operaciones.id_operacion','ventas.operacion_venta')
->join('personas','operaciones.persona_operacion','personas.idpersona')
->join('clientes','personas.idpersona','clientes.cliente_persona')
->paginate(10);

$arreglo[] = array();

@endphp
<br>
<div class="col-sm-4 pull-right">
    <form method="GET" action="{{ route('venta.index') }}" class="navbar-form pull-right" role="search">
        <!--<div class="input-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text" class="form-control" name="name" placeholder="Busqueda">
            <input type="hidden" id="dato" name="dato" value="nuevo">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>-->
    </form>

</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Codigo</th>
            <th scope="col">Cliente</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach($venta_operac as $item)

        <tr>
            <td>{{$item->fecha_oper}}</td>
            <td>{{$item->codigo}}</td>
            <td>{{$item->nombre_apellido}}</td>
            @php
            if($item->estado == "EN NEGOCIACIÓN"){$clase="label-success";}
            if($item->estado == "COMPLETADA"){$clase="label-primary";}
            if($item->estado == "DADO DE BAJA"){$clase="label-danger";}
            @endphp
            <td><span id="estado_label" name="estado_label" class={{$clase}}>{{$item->estado}}</span></td>
            <td style="cursor: default;">
            </td>
            <td style="cursor: default;">
                @can('admin')
                <a onclick="" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-search"></span></a>

                <a href="{{ route('print_venta', ['id1' => $item->idventa,'id2' => $item->idcliente])}}" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-print"></span></a>

                <a onclick="valor_idventa({{$item->idventa}});" data-toggle="modal" data-target="#modal-estado" class="btn btn-warning btn-xs">
                    <span class="glyphicon glyphicon-refresh"></span></a>

                <a href="{{ route('venta.destroy',"")}}" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-trash"></span></a>
                @endcan
            </td>
        </tr>

        @endforeach()

    </tbody>

</table>
{{$venta_operac->render()}}


<!-- Modal Cambio de estado -->
<div id="modal-estado" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="modal-estado"
    style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cambio de Estado</h4>
            </div>
            <div class="modal-body">
                <img id="cargando" style="display:none;" src="/img/cargando.gif"></img>
                <section id="cambio_estado">
                    <label>Estado de la Negociación:</label>
                    <select id="select_estado" class="form-control" id="sel-estadonegociacion">
                        <option value="EN NEGOCIACIÓN">EN NEGOCIACIÓN</option>
                        <option value="COMPLETADA">COMPLETADA</option>
                        <option value="DADO DE BAJA">DADO DE BAJA</option>
                    </select>
                </section>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" onclick="changeEstado();" class="btn btn-success">GUARDAR</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Cambio de estado -->