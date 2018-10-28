<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    protected  $primaryKey = 'id_auto';
    protected $fillable=[
           'id_auto',
           'precio',      
           
           'marca_id',
           'modelo',
           'version',
           'color',   
           
           'ficha',
           'visible',
    ];

   /*   public function autosusados()
    {
        return $this->hasMany(Automovile::class,'auto_id');
    }*/


    public function scopeSearch($query,$name)
     {
        // dd($dato);
         return $query->Where('modelo','LIKE', '%'.$name.'%')
                   
                    ->orWhere('color','LIKE', '%'.$name.'%')
                    ->orWhere('estado','LIKE', '%'.$name.'%')                                      
                    ->orWhere('dominio','LIKE', '%'.$name.'%')
                     ->where('marcas.nombre', 'LIKE', '%' . $name . '%')->join('marcas', 'marcas.id_marca', '=', 'automoviles.marca_id');
     
       
        
     }
}
 