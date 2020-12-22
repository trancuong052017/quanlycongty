<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chiketoan extends Model
{
   //protected $table ='chiketoan';

     public function congtrinh(){
     	return $this->belongsTo('App\Congtrinh','idcongtrinh','id');

     }
      public function user(){
     	return $this->belongsTo('App\User','iduser','id');

     }
    
}
