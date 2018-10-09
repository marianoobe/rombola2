<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    protected  $primaryKey = 'id_auto';
    protected $fillable=[
           'id_auto',
           'vin',
           'dominio',
           'marca',
           'modelo',
           'version',
           'color',          
           'combustible',         
           'estado',
    ];


    public function scopeSearch($query,$name)
     {
        // dd($dato);
         return $query->where('marca','LIKE','%'.$name.'%')
                   ->orWhere('modelo','LIKE', '%'.$name.'%')
                    ->orWhere('version','LIKE', '%'.$name.'%')
                    ->orWhere('color','LIKE', '%'.$name.'%')
                    ->orWhere('estado','LIKE', '%'.$name.'%')                                      
                    ->orWhere('dominio','LIKE', '%'.$name.'%')
                     ->orWhere('vin','LIKE', '%'.$name.'%'); 
      /*  if($dato=='nuevo'){

           return $query->where('marca','LIKE','%'.$name.'%')
                    ->orWhere('version','LIKE', '%'.$name.'%')
                    ->orWhere('color','LIKE', '%'.$name.'%')
                    ->orWhere('estado','LIKE', '%'.$name.'%')                                      
                    
                     ->orWhere('vin','LIKE', '%'.$name.'%');                     
        
        }
        elseif($dato=='usado'){

             return $query->where('marca','LIKE','%'.$name.'%')
                    ->orWhere('version','LIKE', '%'.$name.'%')
                    ->orWhere('color','LIKE', '%'.$name.'%')
                    ->orWhere('estado','LIKE', '%'.$name.'%')                                      
                    ->orWhere('dominio','LIKE', '%'.$name.'%'); 
                                        
        
        }*/
       
        
     }
}
 