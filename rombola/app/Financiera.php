<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiera extends Model
{
    protected $fillable = ['idfinanciera','idtipo','nomb_financ'];

    public static function financieras($id){
        return Financiera::where('nomb_financ','=',$id)->get();
    }

}
