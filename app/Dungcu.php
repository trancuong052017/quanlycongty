<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dungcu extends Model
{    //  protected $table ='dungcu';
      public function congtrinh(){
     	return $this->belongsto('App\Congtrinh','idcongtrinh','id');
     }
      public function user(){
     	return $this->belongsto('App\User','iduser','id');
     }
}
