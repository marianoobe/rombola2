<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listaprecio extends Model
{
    
    protected $fillable = ['id','idmarca','rutalista','rutaimagen','fechalista'
    ];
}
