<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operaciones extends Model
{
    protected $fillable = ['id_operacion','persona_operacion','fecha_oper','estado','aviso'];

}
