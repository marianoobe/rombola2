<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['idventa','operacion_venta','idventa_autousado','idventa_auto0km','idventa_autoentregado',
    'codigo','cod_part1','cod_part2','precio_auto_vendido','efectivo','resto','visible','id_user'];
}
