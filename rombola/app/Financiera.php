<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiera extends Model
{
    protected $table ='financieras';

    protected $fillable = ['idfinanciera','nomb_financ','idtipofinanciera'];

    public static function financiera($id){
        return Financiera::where('idtipofinanciera','=',$id)->get();
    }
}
