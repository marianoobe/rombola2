<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['idcliente','idpersona','fecha_nacimiento', 'domicilio', 'estado_civil','estado_ficha'];
}
