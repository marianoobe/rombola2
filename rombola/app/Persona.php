<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['idpersona','idoperacion','dni','nombre','apellido','email','act_empresa'];
}
