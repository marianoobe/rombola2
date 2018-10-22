<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    protected  $primaryKey = 'id_auto';
    protected $fillable=[
           'id_auto',
           'precio',
           'vin',
           'dominio',
           'idmarca',
           'modelo',
           'descripcion',
           'color',          
           'combustible',         
           'estado',
           'ficha',
           'visible',
    ];


    public function scopeSearch($query,$name)
     {
        // dd($dato);
         return $query->Where('modelo','LIKE', '%'.$name.'%')
                   
                    ->orWhere('color','LIKE', '%'.$name.'%')
                    ->orWhere('estado','LIKE', '%'.$name.'%')                                      
                    ->orWhere('dominio','LIKE', '%'.$name.'%')
                     ->where('marcas.nombre', 'LIKE', '%' . $name . '%')->join('marcas', 'marcas.idmarca', '=', 'automoviles.idmarca');
     
       
        
     }
}
 