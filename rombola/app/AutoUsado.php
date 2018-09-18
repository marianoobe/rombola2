<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosusado extends Model
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
