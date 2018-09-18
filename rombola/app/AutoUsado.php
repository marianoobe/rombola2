<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoUsado extends Model
{
   protected $fillable=[
        'id_autoUsado',
        'id_auto',
        'dominio',
        'titular',
        'anio',
        'kilometros',

   ];
}
