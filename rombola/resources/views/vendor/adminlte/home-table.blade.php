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
{!! Html::script('js/venta.js') !!}

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
                <a onclick="show_venta({{$item->idventa}});" data-toggle="modal" data-target="#modal-showventa" class="btn btn-primary btn-xs">
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

<!-- Modal Ver Venta-->
<div class="modal" id="modal-showventa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					
				<div class="panel panel-default">
					<div class="panel-heading">Cliente</div>
					<div class="panel-body">
						<div class="form-group">
							<label><strong>Nombre y Apellido: </strong></label>
							<label id="show_cliente"></label>
						</div>
						<div class="form-group">
							<label><strong>DNI: </strong></label>
							<label id="show_dni"></label>
						</div>
						<div class="form-group">
							<label><strong>Domicilio: </strong></label>
							<label id="show_domicilio"></label>
						</div>
						<div class="form-group">
							<label><strong>Estado Civil: </strong></label>
							<label id="show_estado_civil"></label>
						</div>
						<div class="form-group">
							<label><strong>Celular: </strong></label>
							<label id="show_celular"></label>
						</div>
						<div class="form-group">
							<label><strong>Actividad/Empresa: </strong></label>
							<label id="show_act_empresa"></label>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Auto Vendido</div>
					<div class="panel-body">
						<div class="form-group">
							<label><strong>Marca: </strong></label>
							<label id="show_marca"></label>
						</div>
						<div class="form-group">
							<label><strong>Modelo: </strong></label>
							<label id="show_modelo"></label>
						</div>
						<div class="form-group">
							<label><strong>Version: </strong></label>
							<label id="show_version"></label>
						</div>

						<section id="section_usado" style="display:none">
							<div class="form-group">
								<label><strong>Dominio: </strong></label>
								<label id="show_dominio"></label>
							</div>
							<div class="form-group">
								<label><strong>N° Chasis: </strong></label>
								<label id="show_numchasis"></label>
							</div>
							<div class="form-group">
								<label><strong>N° Motor: </strong></label>
								<label id="show_nummotor"></label>
							</div>
							<div class="form-group">
								<label><strong>Año: </strong></label>
								<label id="show_anio"></label>
							</div>
						</section>

					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Operación</div>
					<div class="panel-body">
						<div class="form-group">
							<label><strong>Valor Auto Vendido: $</strong></label>
							<label id="show_precio_auto_vendido"></label>
						</div>
						<div class="form-group">
							<label><strong>Contado: $</strong></label>
							<label id="show_efectivo"></label>
						</div>
						<div id="section_usado_entregado" class="panel-body" style="display:none">
						<div class="form-group">
							<label><strong>Valor Auto Entregado: $</strong></label>
							<label id="show_valor_entregado"></label>
						</div>
						<ul>
								<li>
									<div class="form-group">
										<label><strong>Nombre de titular: </strong></label>
										<label id="show_nombre_titular"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>Dominio: </strong></label>
										<label id="show_dominio_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>Marca: </strong></label>
										<label id="show_marca_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>Modelo: </strong></label>
										<label id="show_modelo_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>Version: </strong></label>
										<label id="show_version_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>N° Motor: </strong></label>
										<label id="show_nummotor_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>N° Chasis: </strong></label>
										<label id="show_numchasis_entregado"></label>
									</div>
								</li>
								<li>
									<div class="form-group">
										<label><strong>Color: </strong></label>
										<label id="show_color_entregado"></label>
									</div>
								</li>
							</div>
						</ul>
						<div id="section_cheque" class="panel-body" style="display:none">
						<div class="form-group">
							<label><strong>Total en cheques: $</strong></label>
							<label id="show_total_cheque"></label>
						</div>
						<ul>
							<li>
								<div class="form-group">
									<label><strong>Banco: </strong></label>
									<label id="show_banco"></label>
								</div>
							</li>
							<li>
								<div class="form-group">
									<label><strong>Número: </strong></label>
									<label id="show_numero"></label>
								</div>
							</li>
							<li>
								<div class="form-group">
									<label><strong>Fecha: </strong></label>
									<label id="show_fecha"></label>
								</div>
							</li>
							<li>
							<div class="form-group">
								<label><strong>Importe: </strong></label>
								<label id="show_importe"></label>
							</div>
							</li>
						</div>
					</ul>
						<div class="form-group">
							<label><strong>Total : $</strong></label>
							<label id="show_total"></label>
						</div>
					</div>
				</div>



				<label id="show_precio_auto_vendido"></label>
				<label id="show_modelo"></label>

			</div>
		</div>
	</div>
</div>
<!-- Fin Modal Ver Venta-->