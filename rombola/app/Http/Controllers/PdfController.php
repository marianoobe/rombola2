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
            height: 220px;
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

        
    </style>
</head>

<body>'
;
foreach($preventa as $item)
     {
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
    <br>
    <div id="fila1">
    <p></p>
        <label><strong>Vendedor</strong>: </label>
        <label id="vendedor">sdfgsdg</label>
        <p></p>
        <label><strong>Nombres y Apellidos</strong>: </label>
        <label id="nombapell" value="">'.$item->nombre.' '.$item->apellido.'</label>

        <p></p>
        <label><strong>Correo Electrónico</strong>: </label>
        <label id="email">'.$item->email.'</label>

        <p></p>
        <label><strong>Teléfono</strong>: </label>
        <label id="telefono"> </label>

        <p></p>
        <label><strong>Auto de Interés</strong>: </label>
        <label id="auto_interes">'.$item->auto_interesado.'</label>

        <div ALIGN="center" class="box-header with-border">
        <h4 class="box-title">DETALLE</h4>
    </div>
        <p>'.$item->detalles.'</p>
        <br><br><br><br><br>
        <p></p>

    <div ALIGN="center" class="box-header with-border">
        <h4 class="box-title">FORMA DE PAGO</h4>
    </div>
        <p></p>
        <label for="vendedor"><strong>Auto que entrega</strong>: </label>
        <label for="">'.$item->usado.'</label>
    
        <p></p>
        <label for="vendedor"><strong>Contado</strong>: </label>
        <label for="">'.$item->contado.'</label>

        <p></p>
        <label><strong>Financiación</strong>: </label>
        <label for="">'.$item->nombretipo.'</label>
    
    <section id="financiado">
        <div ALIGN="center" class="box-header with-border">
            <h5 class="box-title">Detalles de Financiación</h5>
        </div>
        <div class="form-group">
            <p></p>
            <label for="vendedor"><strong>Nombre de Financiera</strong>: </label>
            <label for="">'.$item->nomb_financ.'</label>
        </div>
        <div class="form-group">
            <p></p>
            <label for="vendedor"><strong>Cantidad de Cuotas</strong>: </label>
            <label for="">'.$item->numcuotas.'</label>
        </div>
        <div class="form-group">
            <p></p>
            <label for="vendedor"><strong>Importe Total</strong>: </label>
            <label for="">'.$item->importe_finan.'</label>
        </div>
    </section>
    <div ALIGN="center" class="panel-footer">
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