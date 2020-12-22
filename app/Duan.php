<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duan extends Model
{
   //protected $table ='duan';

     public function theloai(){
     	return $this->belongsTo('App\Theloai','id_theloai','id');

     }
}
