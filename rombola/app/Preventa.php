<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preventa extends Model
{
    protected $fillable = ['id_operacion','idpreventa','auto_interesado','detalles',
    'usado','contado','cheques','tipo_financiación','financieras','cant_cuotas','importe_finan','cant_pormes'];
 
}
