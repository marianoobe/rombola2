<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['idpersona','dni','nombre','apellido','email','act_empresa'];

    public function scopeSearch($query,$name)
    {
       // dd($dato);
        return $query->where('dni','LIKE','%'.$name.'%')
                  ->orWhere('nombre','LIKE', '%'.$name.'%')
                   ->orWhere('apellido','LIKE', '%'.$name.'%'); 
                 
    }
}
