<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['idcliente',
    'cliente_persona',
    'idconyuge',
    'idgarante',
    'fecha_nacimiento', 
    'domicilio', 
    'estado_civil',
    'relacion_dependencia',
    'antiguedad',
    'ingresos_mensuales',
    'ingresos_otros',
    'nombre_padre',
    'nombre_madre',
    'estado_ficha',
    'visible',
    'id_user',
    'interes',
    'fecha']; 


}
