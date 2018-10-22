<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App;
use DB;
use PDF;
use App\Persona;
use View;

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


function pdf_venta($id)
{
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_html_venta());
     return $pdf->stream();
}

function convert_html_venta()
{
      /*$dnipers = Persona::where("dni","=",$id)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.preventa_oper','operaciones.id_operacion')
        ->join('telefonos','telefonos.personas_telefono','personas.idpersona')
        ->where('personas.idpersona','=', $idpers)
        ->get();
*/
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
        }

        #comprador {
            width: 300px;
            padding: 0px;
            height: 200px;
            margin: 0px;
            background-color: #CCCCCC;
        }

        h1 {
            text-align: center;
        }
        
        p {
            font-size:10px;
        }

        #pepe{
            line-height: 50%;
        }

        #garante{
            line-height: 80%;
        }

        #usado, #usado_entregado{
            line-height: 80%;
        }
        #izquierda{ width: 280px;
            }

        #derecha {
            margin-left:310px;
            
        }

        #izquierda {
            float: left;
        }

        #derecha {
            float: right;
        }

        #financiado.b {
            visibility: hidden;
        }

        #financiado.a {
            visibility: visible;
        }


        #contenedor1{
            text-align: left;
            width: 750px;
            margin: auto;}
            
            #lateral1{
            line-height: 80%;
            width: 350px;  /*Este será el ancho que tendrá tu columna*/
            float:left; /*Aqui determinas de lado quieres quede esta "columna" */
            }
            
            #principal1{
            line-height: 80%;
            margin-left:370px; /*Este margen hace que no se encime el contenido en tu menúlateral, es     importante que pongas un pocos pixeles más que el ancho  de tu columna lateral*/
            font-size:11px;
            //border:#000000 1px solid; /*ponemos un dorde para que se vea bonito*/
            }

            p.cuadrado {
                width: 100px;
                //padding: 12px 20px;
                //margin: 8px 0;
                //box-sizing: border-box;
                border: 1px solid black;
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
    <div id="cabecera">
    <img src="C:\xampp\htdocs\rombolaagencia\rombola\public\img\logogrande.png" width="160" height="50" />
    <div id="pepe"><p style="font-size:8px;">Direccion Telefono</p>
    <p style="font-size:8px;">info@ragroup.com.ar</p></div>
    <hr>
        <p ALIGN="center" style="font-size:10px;"><strong>SOLICITUD DE RESERVA</strong></p>
    <p style="font-size:8px;">De mi consideración</p>
    <p style="font-size:8px;">Por la presenta solicito a Ustedes la RESERVA de
        la unidad seguidamente detallada en un todo de acuerdo a las condiciones generales
        impresas en esta solicitud. Las que declaro conocer y aceptar por ser ellas de clara
        comprensión y formar parte de esta petición, a las que voluntariamente adhiero, no significando
        ello limitación alguna de mi libertad contractual, hallandome en igualdad de condiciones que la agencia
        para la subscripción, presentado de esta forma mi consentimiento y por resultar conveniente para mis
        intereses</p>

    <div id="derecha">
    <p><strong>Fecha</strong>: 21/12/1991 </p>
    </div>
    <br>
    <br>
     <div id="contenedor1">

        <p> <strong>Comprador</strong>:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DNI</strong>:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Fecha de Nacimiento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Domicilio:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Estado Civil: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teléfono: </p>
        <br>
        <div id="conyuge">
        <p><strong>Conyuge</strong>:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Nacimiento:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Teléfono:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p>
        </div>
        
        <div id="garante">
        <p><strong>Garante</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DNI:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Fecha de Nacimiento:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Domicilio:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Estado Civil:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teléfono: </p>
        </div>
        
        <section id="usado" class=" ">
            <p><strong>Marca</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelo:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Motor N°: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chasis:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Dominio:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Titular: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            DNI (titular): </p>
            
        </section>

                <section id="usado_entregado" class=" ">
                    <p><strong>Marca de auto entregado</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Modelo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dominio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    Motor N°: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chasis: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Titular: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Documentación que entrega: </p>
                    <hr>
                </section>

                <p ALIGN="center" style="font-size:10px;"><strong>DETALLE DE LA OPERACION</strong></p>
            <p></p>
            <p>Precio de Auto reservado</strong>: $</p>

            <p></p>
            <p>Precio de Auto entregado</strong>: $</p>

            <p></p>
            <p> <strong>Efectivo entregado</strong>: $</p>
            
<section id="cheques" class="   ">
<table style="width:100%">
  <tr>
    <th>Cheque N°</th>
    <th>Fecha</th> 
    <th>Banco</th>
    <th>Importe</th>
    
  </tr>
  <tr>
    <td>2321312</td>
    <td>21/12/1996</td>
    <td>Nacion</td>
    <td>$30000</td>
    
  </tr>
  
</table>
</section>
         
<br>
<p>Gastos: $</p>
<p></p>
<p> <strong>Totales</strong>: $</p>
<hr>
<section id="financiacion" class=" ">
<div ALIGN="center" class="box-header with-border">
<p ALIGN="center" style="font-size:10px;"><strong>FINANCIACION</strong></p>
</div>
<p>
 Cuotas de: $    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Vencimiento 1°:
 </p>
</section>

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
...........................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  .....................................  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ..........................................    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ......................................
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    ACLARACION      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           ACLARACION       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         ACLARACION         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        ACLARACION
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
