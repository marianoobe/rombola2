<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{
    public function importExcel() 
    {
        /** El método load permite cargar el archivo definido como primer parámetro */
        Excel::load('productos.xlsx', function ($reader) {
            /**
             * $reader->get() nos permite obtener todas las filas de nuestro archivo
             */
            foreach ($reader->get() as $key => $row) {
                $producto = [
                    'articulo' => $row['articulo'],
                    'cantidad' => $row['cantidad'],
                    'precio' => $row['precio'],
                ];
                /** Una vez obtenido los datos de la fila procedemos a registrarlos */
                if (!empty($producto)) {
                    DB::table('productos')->insert($producto);
                }
            }
            echo 'Los productos han sido importados exitosamente';
        });
    }
}
