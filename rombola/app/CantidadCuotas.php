<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadCuotas extends Model
{
    protected $table ='cantidad_cuotas';

    protected $fillable = ['idcant','numcuotas','idcant_financ'];

    public static function cantidad_cuotas($id){
        return CantidadCuotas::where('idcant_financ','=',$id)->get();
    }
}
