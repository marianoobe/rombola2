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
            height: 200px;
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
            font-size:12px;
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
            width: 350px;  /*Este será el ancho que tendrá tu columna*/
            float:left; /*Aqui determinas de lado quieres quede esta "columna" */
            }
            
            #principal1{
            margin-left:370px; /*Este margen hace que no se encime el contenido en tu menúlateral, es     importante que pongas un pocos pixeles más que el ancho  de tu columna lateral*/
            font-size:11px;
            //border:#000000 1px solid; /*ponemos un dorde para que se vea bonito*/
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
    <img src="C:\xampp\htdocs\rombolaagencia\rombola\public\img\encabezado.png" width="740" height="100" />
    <p>Direccion Telefono</p>
    <div ALIGN="center" class="box-header with-border">
        <h5 class="box-title">SOLICITUD DE RESERVA</h5>
    </div>
    <p style="font-size:8px;">De mi consideración</p>
    <p style="font-size:8px;">Por la presenta solicito a Ustedes la RESERVA de
        la unidad seguidamente detallada en un todo de acuerdo a las condiciones generales
        impresas en esta solicitud. Las que declaro conocer y aceptar por ser ellas de clara
        comprensión y formar parte de esta petición, a las que voluntariamente adhiero, no significando
        ello limitación alguna de mi libertad contractual, hallandome en igualdad de condiciones que la agencia
        para la subscripción, presentado de esta forma mi consentimiento y por resultar conveniente para mis
        intereses</p>

    <br>
    <div id="derecha">
    <p> <strong>Fecha</strong>: </p>
    </div>
    <br>
    <br>
     <div id="contenedor1">
        <div id="lateral1">
            <p> <strong>Comprador</strong>: </p>
            <p>DNI</strong>: </p>
            <p></p>
            <p> Fecha de Nacimiento: </p>
            <p></p>
            <p>Domicilio: </p>
            <p></p>
            <p>Estado Civi: </p>
            <p></p>
            <p>Teléfono: </p>
            <p></p>
        </div>
        <div id="principal1">
            <strong>Conyuge</strong>: Fabricito
            <br>
            <br>
            DNI:
            <br>
            <br>
            Fecha de Nacimiento:
            <br>
            <br>
            Teléfono:
            <br>
            <br>
            <br>
        </div>

        <hr>
        <p><strong>Garante</strong>: </p>
        <p></p>
        <p>DNI: </p>
        <p></p>
        <p>Fecha de Nacimiento: </p>
        <p></p>
        <p>Domicilio: </p>
        <p></p>
        <p>Estado Civil: </p>
        <p></p>
        <p>Teléfono: </p>
        <hr>
        <section id="usado" class=" ">
            <p><strong>Marca</strong>: </p>
            <p></p>
            <p>Modelo: </p>
            <p></p>
            <p>Motor N°: </p>
            <p></p>
            <p>Chasis: </p>
            <p></p>
            <p>Dominio: </p>
            <p></p>
            <p>Titular: </p>
            <p></p>
            <p>DNI (titular): </p>
            <hr>
        </section>

                <section id="usado_entregado" class=" ">
                    <p><strong>Marca de auto entregado</strong>: </p>
                    <p></p>
                    <p>Modelo: </p>
                    <p></p>
                    <p>Dominio: </p>
                    <p></p>
                    <p>Motor N°: </p>
                    <p></p>
                    <p>Chasis: </p>
                    <p></p>
                    <p>Titular: </p>
                    <p></p>
                    <p>Documentación que entrega: </p>
                    <hr>
                </section>

                <div ALIGN="center" class="box-header with-border">
                <h5 class="box-title">DETALLE DE LA OPERACIÓN</h5>
                </div>
            <p></p>
            <p>Precio de Auto reservado</strong>: $</p>

            <p></p>
            <p>Precio de Auto entregado</strong>: $</p>

            <p></p>
            <p> <strong>Efectivo entregado</strong>: $</p>
            
            <section id="cheques" class="   ">
            <hr>
                <p></p>
                <p>Cheque N°: </p>

                <p></p>
                <p>Fecha: </p>

                <p></p>
                <p>Importe: $</p>

                <p></p>
                <p>Banco: </p>
            </section>

<p></p>
<p>Gastos: $</p>
<p></p>
<p> <strong>Totales</strong>: $</p>

<section id="financiacion" class=" ">
<div ALIGN="center" class="box-header with-border">
<h5 class="box-title">FINANCIACION</h5>
</div>
<p></p>
<p>Cuotas de: $</p>
<p></p>
<p>Vencimiento 1°: </p>

</section>

<div>
    <h5>Firmas</h5>
</div>
<br>
<br><br>
<img src="C:\xampp\htdocs\rombolaagencia\rombola\public\img\footerfirma.jpg" width="720" height="100" />                   


</div>
</div>





</body>

</html>';
//}
     //$output .= '</table>';
     return $output;
}
}
