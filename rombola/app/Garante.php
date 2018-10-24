<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garante extends Model
{
    protected $fillable = ['idgarante','idgarante_persona','fecha_nacimiento','domicilio','estado_civil','visible'];
}
