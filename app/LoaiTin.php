<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table ='loaitins';

    public function theloai(){
    	//var_dump('halo');
     	return $this->belongsTo('App\TheLoai','idTheLoai','id'); //quan hệ 1-1 nhưng dảo nguoc của  hasOne
     }

     public function TinTuc(){
     	return $this->hasMany('App\TinTuc','idLoaiTin','id'); //1- NHIỀU 
     }
}
 