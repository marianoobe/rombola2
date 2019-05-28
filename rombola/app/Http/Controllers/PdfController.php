<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App;
use DB;
use PDF;
use App\Persona;
use App\Venta;
use View;
use App\Autocero;
use App\Autosusado;
use App\Cheque;


class PdfController extends Controller
{

function pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_html($id));
     return $pdf->stream();
    }

function convert_html($id)
    {
      $dnipers = Persona::where("dni","=",$id)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.preventa_oper','operaciones.id_operacion')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
        ->where('personas.idpersona','=', $idpers)
        ->get();

     //$customer_data = $this->get_customer_data();
     $output = '
     <html>
    <head>
    <title>User list - PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <style>
        #cabecera {
            width: 740px;
            padding: 0px;
            height: 200px;
            margin: 0px;
        }

        h1 {
            text-align: center;
        }

        #izquierda{ width: 280px;
            }

        #derecha {
            width: 280px;
            
        }

        #contenido {
            width: 50px;  
        }

        #izquierda {
            float: left;
        }

        #derecha {
            float: right;
        }

        #contenido {
            margin-left: 350px;
        }

        #financiado.b {
            visibility: hidden;
        }

        #financiado.a {
            visibility: visible;
        }

        </style>
        </head>

        <body>'
               ;
           foreach($preventa as $item)
           {
           $p=1;
           if($p==1){
           $h="a";
           }
           else{
            $h="b";
           }
    $output .= '
    <div id="cabecera">
        <div id="izquierda">
            <img src="C:\xampp\htdocs\rombolaagencia\rombola\public\img\logogrande.png" width="230" height="100" />
            <h5><i>Compra - Venta - Consignaciones - Gestoría</i></h5>
            <h6>Direccion</h6>
            <h6><strong>I.V.A RESPONSABLE MONOTRIBUTO</strong></h6>
            
        </div>

        <div id="derecha">
            <h3>PREVENTA</h3>
            <h6>DOCUMENTO NO VALIDO COMO FACTURA</h6>
            <p> <strong>N°</strong>: '.$item->codigo.'</p>
            <br>
            <p> <strong>Fecha</strong>: '.$item->fecha_oper.'</p>
            
        </div>
    </div>
    <p style="color:#C0C0C0;">__________________________________________________________________________________________</p>
    <div id="fila1">
        <p> <strong>Vendedor</strong>: Fabricio Carrio </p>
        <p> <strong>Nombres y Apellidos</strong>: '.$item->nombre.' '.$item->apellido.' </p>
        <p></p>
        <p> <strong>Correo Electrónico</strong>: '.$item->email.'</p>
        <p></p>
        <p> <strong>Teléfono</strong>: '.$item->num_tel.' </p>
        <p></p>
        <p> <strong>Auto de Interés</strong>: '.$item->auto_interesado.'</p>
        <hr>
        <div ALIGN="center" class="box-header with-border">
        <h5 class="box-title">DETALLE</h5>
        </div>
        <p>'.$item->detalles.'</p>
        <br><br><br><br><br>
        <p></p>
        <hr>
    <div ALIGN="center" class="box-header with-border">
        <h5 class="box-title">FORMA DE PAGO</h5>
    </div>
        <p></p>
        <p> <strong>Auto que entrega</strong>: '.$item->usado.'</p>
    
        <p></p>
        <p> <strong>Contado</strong>: $'.$item->contado.'</p>
        
        <p></p>
        <p> <strong>Financiación</strong>: '.$item->nombretipo.'</p>
        <hr>
    
    <section id="financiado" class="'.$h.'">
        <div ALIGN="center" class="box-header with-border">
            <h5 class="box-title">Detalles de Financiación</h5>
        </div>
            <p></p>
            <p> <strong>Nombre de Financiera</strong>: '.$item->nomb_financ.'</p>

            <p></p>
            <p> <strong>Cantidad de Cuotas</strong>: '.$item->numcuotas.'</p>

            <p></p>
            <p> <strong>Importe Total</strong>: $'.$item->importe_finan.'</p>

        </div>
    </section>
    <div ALIGN="center">
        <h6>Los precios consignados son meramente informativos</h6>
    </div>
</div>

</body>

</html>';
}
     return $output;
    }


function pdf_venta($idventa,$idcliente)
{
   
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_html_venta($idventa,$idcliente));
     return $pdf->stream();
}

function convert_html_venta($idventa,$idcliente)
{
    
    $ids = Venta::where("idventa","=",$idventa)
            ->select("idventa_autousado","idventa_auto0km","idventa_autoentregado")
            ->get();

    foreach ($ids as $item) {}
        //dd($item->idventa_auto0km.$item->idventa_autousado.$item->idventa_autoentregado);
        
        if ($item->idventa_auto0km != null) {
        $venta_con_0km = DB::table('operaciones')
        ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
        ->join('personas','operaciones.persona_operacion','personas.idpersona')
        ->join('clientes','personas.idpersona','clientes.cliente_persona')
        ->join('autoceros','ventas.idventa_auto0km','autoceros.id_autocero')
        ->where('idcliente','=',$idcliente)  
        ->where('idventa','=',$idventa)   
        ->get();
    
        if ($item->idventa_autoentregado) {
            $venta_entregado = DB::table('operaciones')
                ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
                ->join('personas','operaciones.persona_operacion','personas.idpersona')
                ->join('clientes','personas.idpersona','clientes.cliente_persona')
                ->join('autosusados','ventas.idventa_autousado','autosusados.id_autoUsado')
                ->where('idventa','=',$idventa)
                ->get();
        }
        else {
            $venta_entregado = array('0' => 0,'1' => 1,'2' => 2 );
        }
        $venta_usado=array('0' => 0,'1' => 1,'2' => 2 );

    } else {
        if ($item->idventa_autousado != null) {

            $venta_usado = DB::table('operaciones')
            ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
            ->join('personas','operaciones.persona_operacion','personas.idpersona')
            ->join('clientes','personas.idpersona','clientes.cliente_persona')
            ->join('autosusados','ventas.idventa_autousado','autosusados.id_autoUsado')
            ->where('idcliente','=',$idcliente) 
            ->where('idventa','=',$idventa)
            ->get();

            if ($item->idventa_autoentregado) {
                $venta_entregado = DB::table('operaciones')
                ->join('ventas','operaciones.id_operacion','ventas.operacion_venta')
                ->join('personas','operaciones.persona_operacion','personas.idpersona')
                ->join('clientes','personas.idpersona','clientes.cliente_persona')
                ->join('autosusados','ventas.idventa_autousado','autosusados.id_autoUsado')
                ->where('idventa','=',$idventa)
                ->get();
            }
            else {
                $venta_entregado = array('0' => 0,'1' => 1,'2' => 2 );
            }
            $venta_con_0km =array('0' => 0,'1' => 1,'2' => 2 );
        }
    }

    $c="disable";
    $g="disable";

    foreach ($venta_con_0km as $item0km) {}


    if (count($venta_con_0km)==3) {
        $compro_0km = "disable";
    }else{
        $compro_0km="enable";
        
        if($item0km->idconyuge!=null){ $c="enable"; }
        if($item0km->idgarante!=null){ $g="enable"; }
    }

    if (count($venta_usado)==3) {
        $compro_usado = "disable";
    } else {
        $compro_usado = "enable";
        foreach ($venta_usado as $itemusado) {}
        if($itemusado->idconyuge!=null){ $c="enable"; }
        if($itemusado->idgarante!=null){ $g="enable"; }
    }

    if (count($venta_entregado)==3) {
        $auto_entregado = "disable";
    } else {
        $auto_entregado = "enable";
        foreach ($venta_entregado as $itementregado) {}
    }

    $consulta_cheques = Cheque::where('cheque_venta','=',$idventa)->get();
    
    $cheques = "disable";
     
    if (count($consulta_cheques)==100) {
        $cheques = "enable";
    }

   
    $financiacion = "disable";
    //dd($compro_0km.$compro_usado.$auto_entregado);

     $output = '
     <html>
    <head>
    <title>User list - PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <style>
        #cabecera {
            width: 740px;
            padding: 0px;
            height: 170px;
            margin: 0px;
            font-family: arial, sans-serif;
        }

        #comprador {
            width: 300px;
            padding: 0px;
            height: 200px;
            margin: 0px;
            background-color: #CCCCCC;
            font-family: arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-family: arial, sans-serif;
        }
        
        p {
            font-size:10px;
            font-family: arial, sans-serif;
        }

        #pepe{
            line-height: 50%;
            font-family: arial, sans-serif;
        }

        #garante{
            line-height: 80%;
            font-family: arial, sans-serif;
        }

        #usado, #usado_entregado{
            line-height: 80%;
            font-family: arial, sans-serif;
        }
        #izquierda{ width: 280px;
            }

        #derecha {
            margin-left:310px;
            font-family: arial, sans-serif;
        }

        #izquierda {
            float: left;
            font-family: arial, sans-serif;
        }

        #derecha {
            float: right;
            font-family: arial, sans-serif;
        }

        #financiado.b {
            visibility: hidden;
            font-family: arial, sans-serif;
        }

        #financiado.a {
            visibility: visible;
            font-family: arial, sans-serif;
        }
 
        #conyuge.enable {
            visibility: visible;
            font-family: arial, sans-serif;
        }

        #conyuge.disable {
            visibility: hidden;
            font-family: arial, sans-serif;
        }

        #garante.enable {
            visibility: visible;
            font-family: arial, sans-serif;
        }

        #garante.disable {
            visibility: hidden;
            font-family: arial, sans-serif;
        }

        #cero.enable {
            visibility: visible;
            font-family: arial, sans-serif;
        }

        #cero.disable {
            visibility: hidden;
            font-family: arial, sans-serif;
        }

        #usado.enable {
            visibility: visible;
            font-family: arial, sans-serif;
        }

        #usado.disable {
            visibility: hidden;
            font-family: arial, sans-serif;
        }

        #entregado.enable {
            visibility: visible;
            font-family: arial, sans-serif;
        }

        #entregado.disable {
            visibility: hidden;
            font-family: arial, sans-serif;
        }



        #contenedor1{
            text-align: left;
            width: 750px;
            margin: auto;}
            
            #lateral1{
            line-height: 80%;
            width: 350px;  /*Este será el ancho que tendrá tu columna*/
            float:left; /*Aqui determinas de lado quieres quede esta "columna" */
            font-family: arial, sans-serif;
            }
            
            #principal1{
            line-height: 80%;
            margin-left:370px; /*Este margen hace que no se encime el contenido en tu menúlateral, es     importante que pongas un pocos pixeles más que el ancho  de tu columna lateral*/
            font-size:11px;
            font-family: arial, sans-serif;
            //border:#000000 1px solid; /*ponemos un dorde para que se vea bonito*/
            }

            p.cuadrado {
                width: 100px;
                //padding: 12px 20px;
                //margin: 8px 0;
                //box-sizing: border-box;
                border: 1px solid black;
                font-family: arial, sans-serif;
            }

            table {
                font-size:11px;
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-family: arial, sans-serif;
            }
            

        </style>
        </head>

        <body>' ;
           /*foreach($preventa as $item)
           {
           $p=1;
           if($p==1){
           $h="a";
           }
           else{
            $h="b";
           }*/
    $output .= '
    <div align="right" id="cabecera">
    <img src="https://egresadosindustrial.org/wp-content/uploads/2019/04/logogrande.png" width="160" height="50" />
    
    <div id="pepe">
    <p style="font-size:8px;">Dirección: Av. Rioja y B. De OHiggins Teléfono: 4220892</p>
    <p style="font-size:8px;">info@ragroup.com.ar</p>
    </div>
    <hr>
        <p ALIGN="center" style="font-size:10px;"><strong>SOLICITUD DE VENTA</strong></p>
    <p align="left" style="font-size:8px;">De mi consideración</p>
    <p align="left" style="font-size:8px;">Por la presenta solicito a Ustedes la VENTA de
        la unidad seguidamente detallada en un todo de acuerdo a las condiciones generales
        impresas en esta solicitud. Las que declaro conocer y aceptar por ser ellas de clara
        comprensión y formar parte de esta petición, a las que voluntariamente adhiero, no significando
        ello limitación alguna de mi libertad contractual, hallandome en igualdad de condiciones que la agencia
        para la subscripción, presentado de esta forma mi consentimiento y por resultar conveniente para mis
        intereses</p>

    <div id="derecha">
    <p><strong>Fecha</strong>: '.$item->fecha_oper.' </p>
    </div>
    <br>
    <br>
     <div id="contenedor1">

        <p> <strong>Comprador</strong>:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>DNI</strong>: 35852537 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Fecha de Nacimiento</strong>: 21/12/1991&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Domicilio</strong>: Rioja 2512 (sur) Barrio Libertad - Rawson &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <strong>Estado Civil</strong>: Soltero&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Teléfono</strong>: 154054675</p>
        <br>
        ';

        if($c=="enable"){
        $output .= '
        <div id="conyuge" class="'.$c.'">
        <p><strong>Conyuge</strong>: Paula Rodriguez&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fecha de Nacimiento</strong>: 14/05/1996 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Teléfono</strong>: 155786932 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p>
        </div>';
        }

        if($g=="enable"){
        $output .= '
        <div id="garante" class="enable">
        <p><strong>Garante</strong>: Gladys Esther Rodriguez&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DNI</strong>: 17879922 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Fecha de Nacimiento</strong>: 05/03/1986 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Domicilio</strong>: Libertador 34 (oeste) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Estado Civil</strong>: Casada  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono</strong>: 154984461</p>
        </div>';
        }

        if($compro_0km=="enable"){
        foreach ($venta_con_0km as $item0km) {}
           
        $info_cero= DB::table('automoviles')
        ->join('autoceros','automoviles.id_auto','autoceros.auto_id')
        ->join('marcas','automoviles.id_auto','marcas.id_marca')
        ->where('id_autocero','=',$item0km->idventa_auto0km)
        ->get();
        foreach ($info_cero as $cerokm) {}
        
        $output .= '
        <section id="cerokm" class="enable">
            <p><strong>Marca Auto 0KM</strong>: '.$cerokm->nombre.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Modelo</strong>: '.$cerokm->modelo.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Versión</strong>: '.$cerokm->version.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            
        </section>';
        }

        if($compro_usado=="enable"){
            foreach ($venta_usado as $item_usado) {}
           
                $info_usado= DB::table('automoviles')
                ->join('autosusados','automoviles.id_auto','autosusados.auto_id')
                ->join('marcas','automoviles.id_auto','marcas.id_marca')
                ->where('id_autoUsado','=',$item_usado->idventa_autousado)
                ->get();
                foreach ($info_usado as $usado) {}
                
        $output .= '
        <section id="usado" class="enable">
            <p><strong>Marca</strong>: '.$usado->nombre.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelo: '.$usado->modelo.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Versión: '.$usado->version.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Motor N°: '.$usado->motor_num.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Chasis: '.$usado->chasis_num.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dominio: '.$usado->dominio.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Titular: '.$usado->titular.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </p>
            
        </section>';
        }

        if($auto_entregado=="enable"){

            foreach ($venta_entregado as $item_entregado) {}
           
                $info_entregado= DB::table('automoviles')
                ->join('autosusados','automoviles.id_auto','autosusados.auto_id')
                ->join('marcas','automoviles.id_auto','marcas.id_marca')
                ->where('id_autoUsado','=',$item_entregado->idventa_autoentregado)
                ->get();
                foreach ($info_entregado as $entregado) {}
              
           $output .= '
                <section id="entregado" class="enable">
                    <p><strong>Marca de auto entregado</strong>: '.$entregado->nombre.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Modelo</strong>: '.$entregado->modelo.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    Versión: '.$entregado->version.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Dominio</strong>: '.$entregado->dominio.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <strong>Motor N°</strong>: '.$entregado->motor_num.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <strong>Chasis</strong>:'.$entregado->chasis_num.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Titular</strong>: '.$entregado->titular.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <strong>Documentación que entrega</strong>: Tarjeta verde, Manual oficial, Titulo, RTO</p>
                    <hr>
                </section>';
        }

            $info_venta= DB::table('ventas')
            ->where('idventa','=',$idventa)
            ->get();
            foreach ($info_venta as $venta) {}
            $output .= '
            <p ALIGN="center" style="font-size:10px;"><strong>DETALLE DE LA OPERACION</strong></p>
            <p></p>
            <p><strong>Precio de Auto vendido</strong>: $'.$venta->precio_auto_vendido.'</p>

            <p></p>
            <p><strong>Precio de Auto entregado</strong>: $</p>

            <p></p>
            <p> <strong>Efectivo entregado</strong>: $'.$venta->efectivo.'</p>
            ';
        
        if($cheques=="enable"){
           
                $info_cheque= DB::table('ventas')
                ->join('cheques','ventas.idventa','cheques.cheque_venta') 
                ->where('idventa','=',$idventa)
                ->get();
                foreach ($info_cheque as $cheque) {}
        
            $output .= '
<section id="cheques" class="enable">
<table style="width:100%">
  <tr>
    <th>Cheque N°</th>
    <th>Fecha</th> 
    <th>Banco</th>
    <th>Importe</th>
    
  </tr>
  <tr>
    <td>'.$cheque->numero.'</td>
    <td>'.$cheque->fecha.'</td>
    <td>'.$cheque->banco.'</td>
    <td>'.$cheque->importe.'</td>
    
  </tr>
  
</table>
</section>
         
<br>';
        }
$output .= '
<p><strong>Gastos</strong>: $15000</p>
<p></p>
<p> <strong>Totales</strong>: $415000</p>
<hr>
';

if($financiacion=="enable"){
$output .= '
<section id="financiacion" class="enable">
<div ALIGN="center" class="box-header with-border">
<p ALIGN="center" style="font-size:10px;"><strong>FINANCIACION</strong></p>
</div>
<p>
 Cuotas de: $ 5000   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Vencimiento 1°: 22/12/2018
 </p>
</section>';
}
$output .= '
<div>
    <h5>Firmas</h5>
</div>
<br>
<p>
...........................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ........................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ......................................    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ......................................
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    SOLICITANTE      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           GARANTE       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         AUTORIZO         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         VENDEDOR
<br>
<br>
</p>
<p>
...........................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  .....................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ..........................................    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ......................................
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    ACLARACION      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           ACLARACION       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         ACLARACION         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        ACLARACION
<br>
</p>


</div>
</div>





</body>

</html>';
//}
     //$output .= '</table>';
     return $output;
}
}
