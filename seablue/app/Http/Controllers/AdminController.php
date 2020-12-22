<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\config\session;
use App\Jidlo;
use DB ;
class AdminController extends Controller
{    
 public  function getDangnhapAdmin()
  { 
    return view('admin.login');
  }
  ///
   
   /////////////////////////////////////////////////////////  
 
 public  function getMenu()
  { $menu =Menu::all();
    return view('admin.trangchu',compact('menu'));
  }
  ////////////////////////////////////
  public  function getDangXuatAdmin()
  {//dd(session('user'));
   Auth::logout();
    session()->flush();//xoa session
    //dd(session());
    return redirect('admin/dangnhap');
  }
  /////////////////////////////////////////////////
   public  function postDangnhapAdmin(Request $request )

  { 
    $this->validate($request,[
    'email'=>'required',
    'password'=>'required|min:3|max:10'
  ],
  ['email.required'=>'ban chua nhap email',
    
  'password.required'=>'ban chua nhap passvord',
  'password.min'=>'mat khau it nhat 3 ky tu',
  'password.max'=> 'mat khau nhieu nhat 10 ky tu'
  ]);
    //dd('dangnhap');
   if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
   { $user=Auth::user();
     //dd($user);
   /*$request->session()->put('name',$user->name);
   //dd(session('name'));
     $request->session()->put('id',$user->id);
      $request->session()->put('truycap',$user->truycap);*/

    return redirect('admin/trangchu');
   }
    else{ return redirect('admin/dangnhap')->with('thongbao','dang nhap khong thanh cong');
       }
  } 
////////////////////////////////////////
   public function xoaMenu($id){
            //dd($id);
       
        $menu = Menu::find($id);
        
       
        $menu->delete();
        
      return redirect('admin/trangchu')->with('thongbao','xoa thanh cong');
      }
       public function getThemMenu(){
            //dd($id);
       return view('admin.menu.them');
      }
      public function postThemMenu(Request $request){
        $menu =new Menu ;
        $menu->name =$request->name ;
        $menu->tenkhongdau =changeTitle($request->name);
        $menu->save();   
       return redirect('admin/trangchu');
      }
      ////////////////////////////////////
        public function getJidloDanhsach(){
            //dd($id);
          $danhsachjidlo=Jidlo::all();
       return view('admin.jidlo.danhsach',compact('danhsachjidlo'));
      }
        public function getThemJidlo(){
            $menu =Menu::all();
       return view('admin.jidlo.them',compact('menu'));
      }
        public function xoaJidlo($id){
            //dd($id);
       
        $jidlo = Jidlo::find($id);
        
       
        $jidlo->delete();
        
      return redirect('admin/jidlo/danhsach')->with('thongbao','xoa thanh cong');
      }
      public function postThemJidlo(Request $request){
       /* if($request->hasFile('image_list')){
          
            $files=$request->file('image_list');
           // dd($files);
            $n=0;
             $image_list=array();
         foreach($files as $file ){
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG')
        {
           return redirect('admin/jidlo/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/image/jidlo".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
                $file->move("public/image/jidlo",$Hinh);
                
                $image_list[$n]=$Hinh;
                
           $n=$n+1;
            }
          
          }*/
         if($request->hasFile('image')){
          
            $file=$request->file('image');
           // dd($files);
         
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG')
        {
           return redirect('admin/jidlo/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/image/jidlo".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
             $file->move("public/image/jidlo",$Hinh);
              
              $image=$Hinh ;
          }
        $jidlo =new Jidlo ;
       // $jidlo->image_list=json_encode($image_list);
         $jidlo->image=$image ;
        $jidlo->name =$request->name ;
        $jidlo->id_menu =$request->id_menu;
         $jidlo->tenkhongdau =changeTitle($request->name);
        $jidlo->save();   
       return redirect('admin/jidlo/danhsach');
      }
   
  ///////////////////////////////////////////////
 public  function getThem()
  { //dd('halo');
    
    return view('admin.register');
  }
  ///////////////////////////////////////////////////////////
  public  function postThem(Request $request)
  { //dd('halo');
    $this->validate($request ,
     		[     
              
              'email'=>'required|email|unique:users,email',
               'password'    =>'required|min:6|max:32',
               'passwordAgain'    =>'required|same:password',
              
     		],
     		[
        
     		
        'email.required' =>'ban chua nhap email',
        'email.email' =>'ban chua nhap dung dinh dang email',
        'email.unique' =>'email da duoc su dung',
        'password.required'    =>'ban chua nhap ',
        'password.min'    =>'ban phai nhap it nhat 3 ky tu',
        'password.max'    =>'ban chi duoc nhap nhieu nhat 32 ky tu',
        'passwordAgain.required'    =>'nhap lai la bat buoc',
        'passwordAgain.same'    =>'khong trung mat khau',
        
        
     		]);
       
       try{
        DB::beginTransaction();
        $user_id =\DB::table('users')->insertGetId([
        
        'email' => $request->email,
        
       
        'password' => bcrypt($request->password)
      ]);
        
       
         DB::commit();
          return redirect('admin/trangchu')->with('thongbao','thêm  thành công');
        }catch(\Exception $exception){
          DB::rollback();
       
         return redirect('admin/register')->with('loi','thêm không thành công');
        }
        /*foreach($role_ids as $role_id){
          \DB::table('users_roles')->insert(
            ['roles_id'=>$role_id,
            'user_id'=>$user_id 
            ]);
        }*/
    
       }
///////////////////////////////////////////
  public  function getJidlo($tenkhongdau,$id){
    $jidlo=Jidlo::find($id);
 return view('admin.jidlo.xem',compact('jidlo'));
 
  }
  ///////////////////////////////////////////////
 
	   
}
