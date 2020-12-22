<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{   protected $guarded = [];
    public function permission(){//nhieu nhieu
    	return $this->belongsToMany(permission::class,'permision_roles','role_id','permission_id');
    }

    public function user(){//nhieu nhieu
    	return $this->belongsToMany(User::class,'users_roles','roles_id','user_id');
    }
} 