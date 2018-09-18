<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = ['id_tel','idpersona','num_tel','tipo'];
}
