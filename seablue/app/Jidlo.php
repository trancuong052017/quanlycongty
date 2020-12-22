<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jidlo extends Model
{  
    protected $table ='mon_an';
     public function menu(){
     	dd('menu');
	return $this->belongsTo('App\Menu','id_menu','id');

	      }    
}

