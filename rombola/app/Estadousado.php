<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadousado extends Model
{
 protected  $primaryKey = 'id_estadoUsado';

  protected $fillable=[
        'id_estadoUsado',
        'nombreEstado',
    

   ];
}