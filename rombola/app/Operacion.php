<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $fillable = ['id_operacion','estado','fecha_oper','aviso'];
}
