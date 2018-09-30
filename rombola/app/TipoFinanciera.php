<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFinanciera extends Model
{
    protected $table = 'tipo_financieras';

    protected $fillable = ['nombretipo'];

}
