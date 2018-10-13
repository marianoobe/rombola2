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
    public function index(Request $request)
    {
        /*
       $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('userlist.pdf');
        }
*/    $dni = 35852537;
      $dnipers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.preventa_oper','operaciones.id_operacion')
        ->where('personas.idpersona','=', $idpers)
        ->get();

        view()->share('personas',$preventa);

        $pdf = App::make('dompdf.wrapper');
        $html = View::make('impresion.reporte');
        $pdf->loadHTML($html);
        return $pdf->stream();    
       
    }

    /*public function pdf(Request $request){
        $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('impresion.pdfview');
            // download pdf
            return $pdf->download('userlist.pdf');
        }
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->inline();
}*/


function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_html());
     return $pdf->stream();
    }

function convert_html()
    {

        $dni = 35852537;
      $dnipers = Persona::where("dni","=",$dni)->select("idpersona")->get();
      foreach ($dnipers as $item) {
      }
      $idpers=$item->idpersona;
      
      $preventa = DB::table('personas')
        ->join('operaciones', 'operaciones.persona_operacion' ,'personas.idpersona')
        ->join('preventas','preventas.preventa_oper','operaciones.id_operacion')
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
            <label for="numfac"><strong>N°: </strong></label>
            <label for=""> </label><br>
            <label for="vendedor"><strong>Fecha</strong>: </label>
            <label >'.$item->nombre.'</label>
            
        </div>
    </div>
    <hr>
    <div id="fila1">
        <p> <strong>Vendedor</strong>: Fabricio Carrio </p>
        <p> <strong>Nombres y Apellidos</strong>: '.$item->nombre.' '.$item->apellido.' </p>
        <p></p>
        <p> <strong>Correo Electrónico</strong>: '.$item->email.'</p>
        <p></p>
        <p> <strong>Teléfono</strong>: </p>
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

</html>';}
     //$output .= '</table>';
     return $output;
    }
    
/*
        $pdf = App::make('dompdf.wrapper');
        $html = View::make('impresion.pdfview',$users);
        $pdf->loadHTML($html);
        return $pdf->stream();        
    }
*/
}