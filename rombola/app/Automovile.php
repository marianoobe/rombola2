<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    protected $fillable=[
            'id_auto',
           'marca',
           'modelo',
           'version',
           'chasis_num',
           'motor_num',
    ];
}
