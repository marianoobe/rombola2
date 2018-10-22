<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected  $primaryKey = 'idmarca';
    protected $fillable = ['idmarca','nombre',];
}
