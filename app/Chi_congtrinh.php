<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chi_congtrinh extends Model
{
    //protected $table ='chi_congtrinh';

     public function congtrinh(){
     	return $this->belongsTo('App\congtrinh','idcongtrinh','id');
      }

      public function comment_admin(){
     	return $this->hasMany('App\comment_admin','idchicongtrinh','id');
     }

}
