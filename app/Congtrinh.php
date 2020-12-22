<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Congtrinh extends Model
{
    
     //protected $table ='congtrinh';

     public function thu_congtrinh(){
     	return $this->hasMany('App\Thu_congtrinh','idcongtrinh','id');//1-nhieu
     }
     
public function user(){//nhieu nhieu
    	return $this->belongsToMany(User::class,'congtrinh_user','idcongtrinh','iduser');
    }
    	public function chi_congtrinh(){
     	return $this->hasMany('App\Chi_congtrinh','idcongtrinh','id');//1-1
    }

    public function dungcu(){
     	return $this->hasMany('App\Dungcu','idcongtrinh','id');//1-1
    }
     public function chiketoan(){
        return $this->hasMany('App\Chiketoan','idcongtrinh','id');//1-nhieu
     }
}
