<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhsachDungcu extends Model
{
     protected $table ='danhsachdungcu';
      public function dungcu(){
     	return $this->hasMany('App\Dungcu','madungcu','id'); //1- NHIỀU 
     }
}
