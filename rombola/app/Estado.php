<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  protected  $primaryKey = 'id_estado';

  protected $fillable=[
        'id_estado',
        'nomb_estado',
    

   ];
}
