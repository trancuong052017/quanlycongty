<?php

namespace App\Providers;
use App\Dungcu;
use App\Thu_congtrinh ;
use App\Chi_congtrinh ;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\DanhsachDungcu;
use App\ChitietDanhsachDungcu;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
      
    Gate::define('loaitin.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_category'))  ; 
      });

     Gate::define('loaitin.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_category'));});

     Gate::define('loaitin.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_category'));});

     Gate::define('loaitin.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_category'));
     });

    //////////////////////////////////////////    
    Gate::define('theloai.danhsach',function($user){
        /*dd($user->checkPermissionAccess(config('permissions.access.list_category_parent')));*/
    return    $user->checkPermissionAccess(config('permissions.access.list_category_parent'))  ; 
      });

     Gate::define('theloai.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_category_parent'));});

     Gate::define('theloai.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_category_parent'));});

     Gate::define('theloai.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_category_parent'));
     });

     //////////////////////////////////////////    
    Gate::define('role.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_role'))  ; 
      });

     Gate::define('role.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_role'));});

     Gate::define('role.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_role'));});

     Gate::define('role.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_role'));
     });
      //////////////////////////////////////////    
    Gate::define('tintuc.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_post'))  ; 
      });

     Gate::define('tintuc.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_post'));});

     Gate::define('tintuc.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_post'));});

     Gate::define('tintuc.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_post'));
     });
     ///////////////////////////////////////////    
     Gate::define('user.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_user'))  ; 
      });

     Gate::define('user.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_user'));});

     Gate::define('user.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_user'));});

     Gate::define('user.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_user'));
     });    
         ///////////////////////////////////////////    
     Gate::define('comment.danhsach',function($user){
        //dd(config('permissions.access.list_comment'));
    return    $user->checkPermissionAccess(config('permissions.access.list_comment'))  ; 
      });

     Gate::define('comment.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_comment'));
     });    
            
     Gate::define('permission.them',function($user){
        //dd(config('permissions.access.list_comment'));
    return    $user->checkPermissionAccess(config('permissions.access.add_permission'))  ; 
      });

     Gate::define('comment.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_comment'));
     });    
     ///////////////////////////////////////////////////
      Gate::define('chucvu.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_chucvu'))  ; 
      });

     Gate::define('chucvu.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_chucvu'));});

     Gate::define('chucvu.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_chucvu'));});

     Gate::define('chucvu.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_chucvu'));
     });        
         
          ///////////////////////////////////////////////////
      Gate::define('congtrinh.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_congtrinh'))  ; 
      });

     Gate::define('congtrinh.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_congtrinh'));});

     Gate::define('congtrinh.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_congtrinh'));});

     Gate::define('congtrinh.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_congtrinh'));
     });        
     //////////////////////////////////////////    
       Gate::define('thucongtrinh.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_thucongtrinh'));});

     
       Gate::define('thucongtrinh.sua',function($user,$id){
        $thucongtrinh =Thu_congtrinh::find($id);
        if ($user->checkPermissionAccess(config('permissions.access.edit_thucongtrinh'))&&$user->id==$thucongtrinh->iduser_login)
            {return true;} else{return false ;}
         });  
     Gate::define('thucongtrinh.xoa',function($user,$id){
        $thucongtrinh =Thu_congtrinh::find($id);
        if ($user->checkPermissionAccess(config('permissions.access.delete_thucongtrinh'))&&$user->id==$thucongtrinh->iduser_login)
            {return true;} else{return false ;}
         }); 

     Gate::define('thucongtrinh.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_thucongtrinh'));
     });        
            
     //////////////////////////////////////////    
       Gate::define('chicongtrinh.them',function($user){
        
             return    $user->checkPermissionAccess(config('permissions.access.add_chicongtrinh'));});

     
     Gate::define('chicongtrinh.sua',function($user,$id){
        $chicongtrinh =Chi_congtrinh::find($id);
        if ($user->checkPermissionAccess(config('permissions.access.edit_chicongtrinh'))&&$user->id==$chicongtrinh->iduser_login)
            {return true;} else{return false ;}
         }); 
    
      Gate::define('chicongtrinh.xoa',function($user,$id){
        $chicongtrinh =Chi_congtrinh::find($id);
        //dd($chicongtrinh);
        if ($user->checkPermissionAccess(config('permissions.access.delete_chicongtrinh'))&&$user->id==$chicongtrinh->iduser_login)
            {return true;} else{return false ;}
         }); 
    
     Gate::define('chicongtrinh.danhsach',function($user){
         
         return    $user->checkPermissionAccess(config('permissions.access.list_chicongtrinh'));
     });  
///////////////////////////////////////////////////
      Gate::define('dungcu.them',function($user){
        // dd($user->checkPermissionAccess(config('permissions.access.add_dungcu')));
             return    $user->checkPermissionAccess(config('permissions.access.add_dungcu'));});

      Gate::define('dungcu.sua',function($user,$id){
        //dd($user->id);
        $dungcu=Dungcu::find($id);
        if($user->checkPermissionAccess(config('permissions.access.edit_dungcu'))&&$user->id==$dungcu->iduser){return true ;}
        else{ return false ;}
        
     });
    Gate::define('dungcu.xoa',function($user,$id){
         $dungcu=Dungcu::find($id);
        if($user->checkPermissionAccess(config('permissions.access.delete_dungcu'))&&$user->id==$dungcu->iduser){return true ;}
        else{ return false ;}
     });   
     Gate::define('dungcu.danhsach',function($user){
    return $user->checkPermissionAccess(config('permissions.access.list_dungcu'));
       });    
        Gate::define('dungcu.danhsachchitiet',function($user){
    return $user->checkPermissionAccess(config('permissions.access.list_chitiet_dungcu'));
       });                    
      ///////////////////////////////////////////////////
      Gate::define('danhsachdungcu.them',function($user){
       
             return    $user->checkPermissionAccess(config('permissions.access.add_danhsachdungcu'));});

      Gate::define('danhsachdungcu.xoa',function($user,$id){
         $danhsachdungcu=DanhsachDungcu::find($id);
        if($user->checkPermissionAccess(config('permissions.access.delete_danhsachdungcu'))&&$user->id==$danhsachdungcu->id_login){return true ;}
        else{ return false ;}
     });        
    
      Gate::define('danhsachdungcu.danhsach',function($user){
    return $user->checkPermissionAccess(config('permissions.access.list_danhsachdungcu'));
     });  
       

       Gate::define('danhsachdungcu.sua',function($user,$id){
        //dd($user->id);
        $danhsachdungcu=DanhsachDungcu::find($id);
        if($user->checkPermissionAccess(config('permissions.access.edit_danhsachdungcu'))&&$user->id==$danhsachdungcu->id_login){return true ;}
        else{ return false ;}
        
     });
       ///////////////////////////////////
        Gate::define('chitietdanhsachdungcu.xoa',function($user){
       
          return    $user->checkPermissionAccess(config('permissions.access.delete_chitietdanhsachdungcu'));
             
     });        
    
      Gate::define('chitietdanhsachdungcu.danhsach',function($user){
    return $user->checkPermissionAccess(config('permissions.access.list_chitietdanhsachdungcu'));
     });  

           ///////////////////////////////////////////////////
      Gate::define('chiketoan.danhsach',function($user){
        
    return    $user->checkPermissionAccess(config('permissions.access.list_chiketoan'))  ; 
      });

     Gate::define('chiketoan.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_chiketoan'));});

     Gate::define('chiketoan.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_chiketoan'));});

     Gate::define('chiketoan.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_chiketoan'));
     });        
     //////////////////////////////////////////    
       Gate::define('thuketoan.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_thuketoan'));});

     Gate::define('thuketoan.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_thuketoan'));});

     Gate::define('thuketoan.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_thuketoan'));
     });        
     Gate::define('thuketoan.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_thuketoan'));
     });        
            
      //////////////////////////////////////////    
       Gate::define('tonghopthuketoan.danhsach',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.list_tonghopthuketoan'));});

     Gate::define('tonghopchiketoan.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_tonghopchiketoan'));});

     Gate::define('tonghopthucongtrinh.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_tonghopthucongtrinh'));
     });        
     Gate::define('tonghopchicongtrinh.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_tonghopchicongtrinh'));
     });  
     Gate::define('tonghopdungcu.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_tonghopdungcu'));
     });       
           
       Gate::define('guinhieu_email.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_guinhieu_email'));
     });                      
    
    //////////////////////////////////////////    
       Gate::define('duan.them',function($user){
             return    $user->checkPermissionAccess(config('permissions.access.add_duan'));});

     Gate::define('duan.sua',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.edit_duan'));});

     Gate::define('duan.xoa',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.delete_duan'));
     });        
     Gate::define('duan.danhsach',function($user){
         return    $user->checkPermissionAccess(config('permissions.access.list_duan'));
     });        
    }        
}
 