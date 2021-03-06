<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preventa extends Model
{
    protected $fillable = ['idpreventa','preventa_oper','auto_interesado','detalles',
    'usado','contado','otropago','nombretipo','nomb_financ','numcuotas','importe_finan','cant_pormes','cod_part1',
    'cod_part2','codigo'];
 
    public function scopeSearch($query,$name)
    {
       // dd($dato);
        return $query->where('nombretipo','LIKE','%'.$name.'%')
                  ->orWhere('usado','LIKE', '%'.$name.'%')
                   ->orWhere('auto_interesado','LIKE', '%'.$name.'%'); 
                 
    }
}
