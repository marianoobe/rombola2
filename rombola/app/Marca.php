<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected  $primaryKey = 'id_marca';
    protected $fillable = ['id_marca','nombre',];
}
