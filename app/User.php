<?php

namespace App;
use App\role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\chuc_vu;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function comment(){
        return $this->hasMany('App\Comment','idUser','id');
     }

    
     public function roles(){
        return $this->belongsToMany('App\role','users_roles','user_id','roles_id');//nhieu-nhieu
     }

      public function chucvu(){
        //dd('halo');
        return $this->belongsToMany('App\chuc_vu','chuc_vu_user','user_id','chuc_vu_id');//nhieu-nhieu
     }

       public function congtrinh(){
        //dd('halo');
        return $this->belongsToMany('App\congtrinh','congtrinh_user','iduser','idcongtrinh');//nhieu-nhieu
     }

     public function dungcu(){
        //dd('halo');
        return $this->hasMany('App\Dungcu','iduser','id');//1-nhieu
     }
   public function checkPermissionAccess($permissionCheck){
   // dd($permissionCheck);
    //lay cac quyen cua user dang login vao he thong 
    //sau do so sanh quyen do voi quyen dua vao tu router
    $roles= auth()->user()->roles;
    //dd($permissionCheck);
    //dd($roles);
    foreach($roles as $role){
     $permission =$role->permission ;
     //dd($permissionCheck);
   
    if($permission->contains('key_code',$permissionCheck)){
        return true;
    }

    }
    return false ;
   } 

   
}
