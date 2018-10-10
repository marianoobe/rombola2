<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = ['id_tel','personas_telefono','num_tel','tipo'];
}
