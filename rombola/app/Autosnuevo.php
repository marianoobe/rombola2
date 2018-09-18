<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosnuevo extends Model
{
    protected $fillable=[
        'idautoNuevo',
        'id_auto',
        'vin',
    ];
}
