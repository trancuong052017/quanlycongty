<?php

namespace App\Http\Controllers;
use App\role ;
use App\User;
use App\users_role;
use App\chuc_vu;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use App\config\session;
use App\nguoidung;
use DB ;
class UserController extends Controller
{  public  function getDanhSach()

  { $user_login=Auth::user();
  if($user_login->truycap==1){

    $user=User::where('truycap','<>','2')->get();//khong lay 2 ra 
  }
    elseif($user_login->truycap==2){
      $user=User::all();
    }
  else{
   $id=$user_login->id;
   
    $user =User::where('id','=',$id)->get();
   }
   
    return view('admin.user.danhsach',['user'=>$user]);
  }
   /////////////////////////////////////////////////////////  
 public  function getDangnhapAdmin()
  { //dd('halo');
    return view('admin.login');
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
    //dd($user->email);
    if($user->tinh_trang == 0){
    // dd($user->tinh_trang);
     return redirect('trangchu');
    }
    else{
   $request->session()->put('name',$user->name);
   //dd(session('name'));
     $request->session()->put('id',$user->id);
      $request->session()->put('truycap',$user->truycap);
    return redirect('admin/trangchu');
   }
 }
    else{ return redirect('admin/dangnhap')->with('thongbao','dang nhap khong thanh cong');
       }
  }
   
  ///////////////////////////////////////////////
 public  function getThem()
  { //dd('halo');
    $role = role::all();
    $chucvu =chuc_vu::all();
    return view('admin.user.them',compact('role','chucvu'));
  }
  ///////////////////////////////////////////////////////////
  public  function postThem(Request $request)
  { //dd('halo');
    $this->validate($request ,
     		[     'role_id'=>'required',
              'name'=>'required|min:3',
              'email'=>'required|email|unique:users,email',
               'password'    =>'required|min:6|max:32',
               'passwordAgain'    =>'required|same:password',
               'phon'=>'required|min:6'
     		],
     		[
        'role_id.required'=>'ban chua chon phan quyen',
     		'name.required'=>'ban chua nhap ten ',
     		'name.min'=>'ten nguoi dung it nhat 3 ky tu',
        'email.required' =>'ban chua nhap email',
        'email.email' =>'ban chua nhap dung dinh dang email',
        'email.unique' =>'email da duoc su dung',
        'password.required'    =>'ban chua nhap ',
        'password.min'    =>'ban phai nhap it nhat 3 ky tu',
        'password.max'    =>'ban chi duoc nhap nhieu nhat 32 ky tu',
        'passwordAgain.required'    =>'nhap lai la bat buoc',
        'passwordAgain.same'    =>'khong trung mat khau',
        'phon.required'=>'dien thoai la bat buoc'
        
     		]);
       
       try{
        DB::beginTransaction();
        $user_id =\DB::table('users')->insertGetId([
        'name' => $request->name,
        'email' => $request->email,
        'quyen' => 1,
        'phon' => $request->phon,
        'tinh_trang'=>1 ,
         'truycap'  => 0,
        'password' => bcrypt($request->password)
      ]);
        
         //$user->save();
        $role_ids =$request->role_id;
         $chucvu_ids =$request->chucvu_ids;
         //dd($chucvu_ids);
         $user = user::find($user_id);
        //dd($user);
        $user->roles()->attach($role_ids);//dua vao user_role 
        $user->chucvu()->attach($chucvu_ids);
         DB::commit();
          return redirect('admin/user/danhsach')->with('thongbao','thêm  thành công');
        }catch(\Exception $exception){
          DB::rollback();
        Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
         return redirect('admin/user/them')->with('loi','thêm không thành công');
        }
        /*foreach($role_ids as $role_id){
          \DB::table('users_roles')->insert(
            ['roles_id'=>$role_id,
            'user_id'=>$user_id 
            ]);
        }*/
    
       }
///////////////////////////////////////////
  public  function getSua($id)
  { $user_login=Auth::user();
    //dd($user->id);
    if($user_login->id==$id||$user_login->truycap==1||$user_login->truycap==2){
    $user = user::find($id);
       //dd($user);
        $role = role::all();
        $rolechecked =$user->roles;
        $chucvuChecked =$user->chucvu ;
        $chucvu =chuc_vu::all();
       // dd($chucvuChecked);
    return view('admin.user.sua',compact('user','role','rolechecked','chucvuChecked','chucvu'));
     }
  else{ 
        return redirect('admin/user/danhsach')->with('loi','ban khong co quyen truy cap');}
  }
  ///////////////////////////////////////////////
  public  function postSua(Request $request ,$id)
  { //dd('halo');
     $user_login=Auth::user();
     //($user);
   if($user_login->id==$id||$user_login->truycap==1||$user_login->truycap==2){
      $user = user::find($id);
   
      
    $this->validate($request ,
        [
          'name'=>'required|min:3',
         
        ],
        [
        'name.required'=>'chưa nhập tên  ',
        'name.min'=>'ten nguoi dung it nhat 3 ky tu',
         ]);
          $user->tinh_trang =$request->tinh_trang ;
          if($request->tinh_trang==0){
          $user->quyen =0 ; 
          }
        else{
         $user->quyen =1 ;
           }
          if(is_null($request->truycap)==true)
          {$user->truycap  = $user->truycap;}
        else{
         $user->truycap = 0;
           }
         
         $user->phon =$request->phon;
     if($request->changepassword=='on')   {
        $this->validate($request ,
           [
              
               'password'    =>'min:6|max:32',
               'passwordAgain'    =>'required|same:password'
        ],
        [
         'password.required'    =>'ban phai nhap mat khau',
        'password.min'    =>'ban phai nhap it nhat 3 ky tu',
        'password.max'    =>'ban chi duoc nhap nhieu nhat 32 ky tu',
        'passwordAgain.required'    =>'nhap lai la bat buoc',
        'passwordAgain.same'    =>'khong trung mat khau'
        
        ]);
       $user->password = bcrypt($request->password);
       }
       
       if($request->changeemail=='on'){
        $this->validate($request ,
        [
         'email'=>'required|email|unique:users,email',
        ],
        [
        
         'email.required' =>'ban chua nhap email',
        'email.email' =>'ban chua nhap dung dinh dang email',
        'email.unique' =>'email da duoc su dung',
        ]);
       $user->email =$request->email;
      }
       $user->name  =$request->name;
       try{
        DB::beginTransaction();
        //dd(session('user')->truycap);
         $user->save();
       //$user_login=Auth::user();
         
        $role_ids =$request->role_ids;
       if($user_login->truycap==1||$user_login->truycap==2){
      $user->chucvu()->sync($request->chucvu_ids);//dua vao user_chucvu
       $user->roles()->sync($role_ids);//dua vao user_role }
        }
       /*  if($user->truycap==1||$user->truycap==2){
   $user->chucvu()->sync($request->chucvu_ids);}//dua user_chucvu  
       */
         DB::commit();
          return redirect('admin/user/sua/'.$id)->with('thongbao','sua thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
        Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
       }
       else{ return redirect('admin/user/sua/'.$id)->with('loi','ban khong co quyen truy cap');}
    
  }
    	//////////////////////
    	 public function getXoa($id){
            //dd($id);
       
    	 	$user = user::find($id);
        try{
        DB::beginTransaction();
         $idUser=Comment::where('idUser',$id)->get();//xoa bamg comment
          if(count($idUser)!=0){
           return redirect('admin/user/danhsach')->with('loi','xoa khong thanh cong phaỉ xóa bình luận trước '); 
          }

       
       
        DB::table('chuc_vu_user')->where('user_id',$id)->delete();
         DB::table('users_roles')->where('user_id',$id)->delete();
        
        $user->delete();
         DB::commit();
    	return redirect('admin/user/danhsach')->with('thongbao','xoa thanh cong');
      
      }catch(\Exception $exception){
          DB::rollback();
        Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
       
    }
/////////////////////////////////////////////////
    public  function getDangkyNguoidung()
  { 
    return view('pages.dangky');
  }
    public  function postDangkyNguoidung(Request $request)
  {  $this->validate($request,[
    'email'=>'required|unique:nguoidung,email',
    'password'=>'required|min:3|max:10',
    'name'=>'required'
  ],
  ['email.required'=>'ban chua nhap email',
  'email.unique'=>' email da duoc dung ',
  'password.required'=>'ban chua nhap passvord',
  'password.min'=>'mat khau it nhat 3 ky tu',
  'password.max'=> 'mat khau nhieu nhat 10 ky tu',
  'name.required'=>'chua nhap ten',
  ]);
  $user=new nguoidung;
  $user->email=$request->email;
  $user->password=md5($request->password);
  $user->name=$request->name;
  
 
  if($user->save()){

  
    return redirect('trangchu')->with('thongbao','đăng ký  thanh công ');}
    else{ 
      redirect('/dangky')->with('loi','đăng ký không thanh công');
    }
  }
  ////////////////////////////////////
  public  function getDangXuatPage()
  {
   Auth::logout();
    
    session()->flush();//xoa session
    //dd(session('id'));
    return redirect('trangchu');
  }
  /////////////////////////////////////////////////
   public  function getDangnhapPage()
    {
      return view('pages.dangnhap');
    }
   public  function postDangnhapPage(Request $request )
  { $this->validate($request,[
    'email'=>'required',
    'password'=>'required|min:3|max:10'
  ],
  ['email.required'=>'ban chua nhap email',
  'password.required'=>'ban chua nhap passvord',
  'password.min'=>'mat khau it nhat 3 ky tu',
  'password.max'=> 'mat khau nhieu nhat 10 ky tu'
  ]);
     $password=md5($request->password);
    $user =nguoidung::where('email',$request->email)->where('password',$password)->first();
    //dd($user); dd($user->name);
    
    if($user!=null){
   $request->session()->put('ten',$user->name);
     //dd($request->session()->get('name'));
     $request->session()->put('id_nguoidung',$user->id);
     return redirect('trangchu');
   }
    else{ return redirect('dangnhap')->with('loi','dang nhap khong thanh cong');
       }

  }
  //////////////////////////////////////////////////////////
   public  function getNguoiDungPage($id ,Request $request)
    {  //dd($id)
        $nguoidung = nguoidung::find($id);
        return view('pages.nguoidung',['nguoidung'=>$nguoidung]);
    }

    public  function postNguoiDungPage($id ,Request $request)
  { // dd($id);
    $user = nguoidung::find($id);
    $this->validate($request ,
        [
              'name'=>'required|min:3',
               'email'=>'required|email',
        ],
        [
        'name.required'=>'ban chua nhap ten ',
        'name.min'=>'ten nguoi dung it nhat 3 ky tu',
        'email.required'=>'chua nhap email',
        'email.email'=>'chua dung dinh dang email'
        ]);
     
       
        $user->name = $request->name ;
        $user->email=$request->email;
     if($request->changepassword=='on')   {
        $this->validate($request ,
           [
              
               'password'    =>'min:6|max:32',
               'passwordAgain'    =>'required|same:password'
        ],
        [
         'password.required'    =>'ban phai nhap mat khau',
        'password.min'    =>'ban phai nhap it nhat 3 ky tu',
        'password.max'    =>'ban chi duoc nhap nhieu nhat 32 ky tu',
        'passwordAgain.required'    =>'nhap lai la bat buoc',
        'passwordAgain.same'    =>'khong trung mat khau'
        
        ]);
        $user->password = md5($request->password);
       }
       

        $user->save();
      
    return redirect('trangchu')->with('thongbao','sua thanh cong');
  }
}
