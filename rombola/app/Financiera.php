<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiera extends Model
{
    protected $table ='financieras';

    protected $fillable = ['idfinanciera','nomb_financ','idtipofinanciera'];

    public static function financieras($id){
        return Financiera::where('idtipofinanciera','=',$id+1)->get();
    }

}
