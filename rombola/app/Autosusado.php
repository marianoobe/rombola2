<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosusado extends Model
{
 protected  $primaryKey = 'id_autoUsado';

  protected $fillable=[
        'id_autoUsado',
        'auto_id',
        'titular',
        'anio',
        'kilometros',
        'chasis_num',
        'motor_num',
        'dominio',
        'fechaingreso',
        'estadoUsado_id',
        'combustible',

   ];



  /*  public function automovil()
    {
        return $this->belongsTo(Autousado::class,'auto_id');
    }*/
}
