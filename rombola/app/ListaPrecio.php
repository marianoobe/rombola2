<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listaprecio extends Model
{
    
    protected $fillable = ['id','marca_id','rutalista','rutaimagen','fechalista'
    ];
}
