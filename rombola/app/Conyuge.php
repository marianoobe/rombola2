<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conyuge extends Model
{
    protected $fillable = ['idconyuge','idconyuge_persona','fecha_nacimiento','domicilio','visible'];
}
