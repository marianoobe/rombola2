<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autocero extends Model
{
    protected  $primaryKey = 'id_autocero';
    protected $fillable=[
           'id_autocero',
           'vin',
            'id_auto',
            'estadocero_id'
          
    ];


      public function scopeSearch($query,$name)
     {
        // dd($dato);
         return $query->Where('modelo','LIKE', '%'.$name.'%')
                   
                    ->orWhere('color','LIKE', '%'.$name.'%')
                                                      
                    ->orWhere('vin','LIKE', '%'.$name.'%')
                     ->where('marcas.nombre', 'LIKE', '%' . $name . '%')->join('marcas', 'marcas.idmarca', '=', 'autoceros.idmarca');
     
       
        
     }
}
 