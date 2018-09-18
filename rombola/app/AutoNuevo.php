<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoNuevo extends Model
{
    protected $fillable=[
        'idautoNuevo',
        'id_auto',
        'vin',
    ];
}
