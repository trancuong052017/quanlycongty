<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuketoan extends Model
{
    //protected $table ='thuketoan';
     public function congtrinh(){
     	return $this->belongsTo('App\Congtrinh','idcongtrinh','id');

     }
}
