<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadCuotas extends Model
{
    protected $fillable = ['idcant','idfinanciera','numcuotas'];
}
