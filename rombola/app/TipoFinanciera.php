<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFinanciera extends Model
{
    protected $fillable = ['idtipo','nombretipo'];

    public static function cantidad_cuotas($id){
        return TipoFinanciera::where('idcant_financ','=',$id)->get();
    }
}
