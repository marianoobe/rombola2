<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovile extends Model
{
    protected $fillable=[
           'id_auto',
           'marca',
           'modelo',
           'version',
           'color',          
           'combustible',
           'chasis_num',
           'motor_num',
            'estado',
    ];


    public function scopeSearch($query,$name)
     {

             
            return $query->where('marca','LIKE','%'.$name.'%')
                    ->orWhere('version','LIKE', '%'.$name.'%')
                    ->orWhere('color','LIKE', '%'.$name.'%')
					->orWhere('estado','LIKE', '%'.$name.'%');                                        
                                        
        
        
     }
}
 