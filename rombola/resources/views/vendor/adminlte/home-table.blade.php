@php
use App\Operaciones;
$venta_operac = Operaciones::
join('ventas','operaciones.id_operacion','ventas.operacion_venta')
->join('personas','operaciones.persona_operacion','personas.idpersona')
->join('clientes','personas.idpersona','clientes.cliente_persona')
->paginate(10);
        
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
			<td><span class="label label-success">{{$item->estado}}</span></td>
            <td style="cursor: default;">
            </td>
            <td style="cursor: default;">
                @can('admin')
                <a href="" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-search"></span></a>

                <a href="{{ route('print_venta', ['id1' => $item->idventa,'id2' => $item->idcliente])}}" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-print"></span></a>

                <a onclick="$('#modal-estado').modal('show');" class="btn btn-warning btn-sm">
                    <span class="glyphicon glyphicon-refresh"></span></a>
                <a href="{{ route('venta.destroy',"")}}" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-trash"></span></a>
                @endcan
            </td>
        </tr>
        @endforeach()
        
    </tbody>
</table>
{{$venta_operac->render()}}

<!-- Modal Cambio de estado -->
					<div id="modal-estado" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
					 style="display: none;">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									<h4 class="modal-title">Cambio de Estado</h4>
								</div>
								<div class="modal-body">
									<label>Estado de la Negociación:</label>
									<select class="form-control" id="sel-estadonegociacion">
										<option value="EN NEGOCIACIÓN">EN NEGOCIACIÓN</option>
										<option value="COMPLETADA">COMPLETADA</option>
										<option value="DADO DE BAJA">DADO DE BAJA</option>
									</select>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
									<button type="button" onclick="changeEstado();" class="btn btn-success">GUARDAR</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin Modal Cambio de estado -->
