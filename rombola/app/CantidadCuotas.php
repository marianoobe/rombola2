<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadCuotas extends Model
{
<<<<<<< HEAD
    protected $table ='cantidad_cuotas';

    protected $fillable = ['idcant','numcuotas','idcant_financ'];

    public static function cantidad_cuotas($id){
        return CantidadCuotas::where('idcant_financ','=',$id)->get();
    }
=======
    protected $fillable = ['idcant','idfinanciera','numcuotas'];
>>>>>>> eafc9ea23434e9d72f909697396995f94e7824e5
}
