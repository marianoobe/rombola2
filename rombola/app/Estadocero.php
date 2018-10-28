<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadocero extends Model
{
 protected  $primaryKey = 'id_estadoCero';

  protected $fillable=[
        'id_estadoCero',
        'nombreEstado',
    

   ];
}