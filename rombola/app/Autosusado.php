<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosusado extends Model
{
 protected  $primaryKey = 'id_autoUsado';

  protected $fillable=[
        'id_autoUsado',
        'id_auto',
        'titular',
        'anio',
        'kilometros',
        'chasis_num',
        'motor_num',
        'dominio',
        'fechaingreso',
        'id_estadoUsado',
        'combustible',

   ];
}
