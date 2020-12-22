<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
     protected $table ='theloais';

     public function duan(){
     	//var_dump('xinchao');1- nhieu
     	return $this->hasMany('App\Duan','id_theloai','id');
     	
     } 

     public function tintuc(){
     	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheloai','idLoaiTin','id');
     }
}
