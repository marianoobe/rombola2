<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $fillable = ['idcheque','cheque_venta','numero', 'fecha', 'banco','importe','estado'];

}
