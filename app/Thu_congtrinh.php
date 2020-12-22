<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thu_congtrinh extends Model
{
    //protected $table ='thu_congtrinh';

     public function congtrinh(){

     return $this->belongsTo('App\Congtrinh','idcongtrinh','id');//1-1
     
     }
    
     
      public function comment_admin(){
     	return $this->hasMany('App\comment_admin','idchicongtrinh','id');
     }
      public function user(){
     	return $this->belongsTo('App\congtrinh','iduser_login','id');//1-1
     
     }
}
