<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table ='permissions';

    public function quyencon(){
    return $this->hasMany('App\permission' ,'parent_id' );	// 1-NHIEU 
    }
}
