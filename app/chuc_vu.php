<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chuc_vu extends Model
{
     protected $guarded = [];
    public function user(){//nhieu nhieu
    	//dd('halo');
   
  return $this->belongsToMany(User::class,'chuc_vu_user','chuc_vu_id','user_id');
    }

    /* public function permission(){//nhieu nhieu
    	return $this->belongsToMany(permission::class,'permision_roles','role_id','permission_id');
    }*/
}
