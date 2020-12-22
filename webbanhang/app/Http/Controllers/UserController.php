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
{  public  function getDanhSach(){

   $user =User::all();
    return view('admin.user.danhsach',['user'=>$user]);
  }
   /////////////////////////////////////////////////////////  
 public  function getDangnhapAdmin()
  { 
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
     //dd($user);
   $request->session()->put('name',$user->name);
   //dd(session('name'));
     $request->session()->put('id',$user->id);
      $request->session()->put('truycap',$user->truycap);
    return redirect('admin/trangchu');
   }
    else{ return redirect('admin/dangnhap')->with('thongbao','dang nhap khong thanh cong');
       }
  } 
  ///////////////////////////////////////////////
 public  function getThem()
  { 
   
   
    return view('admin.user.them');
  }
  ///////////////////////////////////////////////////////////
  public  function postThem(Request $request)
  { //dd($request->all());
    $this->validate($request ,
     		[     
              'name'=>'required|min:3',
              'email'=>'required|email|unique:users,email',
               'password'    =>'required|min:6|max:32',
               'passwordAgain'    =>'required|same:password',
               //'phon'=>'required|min:6'
     		],
     		[
       
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
       
     		]);
       //dd($request->all());
       try{
        DB::beginTransaction();
        $user_id =\DB::table('users')->insertGetId([
        'name' => $request->name,
        'email' => $request->email,
        'quyen' => 1,
        'phone' => $request->phone,
        'address'=>$request->address,
         
        'password' => bcrypt($request->password)
      ]);
        
        
        DB::commit();
          return redirect('admin/user/danhsach')->with('thongbao','thêm  thành công');
        }catch(\Exception $exception){
          DB::rollback();
        
         return redirect('admin/register')->with('loi','thêm không thành công');
        }
        
    
       }
///////////////////////////////////////////
  public  function getSua($id)
  {
   
    $user = user::find($id);
       //dd($user);
       
return view('admin.user.sua',compact('user'));
     
  
  }
  ///////////////////////////////////////////////
  public  function postSua(Request $request ,$id)
  { 
      $user = user::find($id);
     //dd($user);
     if($request->pasword) {
    $this->validate($request ,
        [
          'pasword'=>'min:6',
           'paswordAgain'=>'required|same:password',
        ],
        [
        'passwordAgain.same'    =>'khong trung mat khau',
        'pasword.min'=>'mat khau it nhat 3 ky tu',
           ]);}
        
          
         $user->quyen =1 ;
          
         $user->phone =$request->phone;
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
       try{
        DB::beginTransaction();
        //dd(session('user')->truycap);
         $user->save();
        // dd($user->id);
       //$user_login=Auth::user();
         
       
        DB::commit();
          return redirect('admin/user/sua/'.$id)->with('thongbao','sua thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
         return redirect('admin/user/sua/'.$id)->with('loi','sửa không thành công');
        }
       
      
    
  }
    	//////////////////////
    	 public function getXoa($id){
            //dd($id);
       
    	 	$user = user::find($id);
      
       if($user->delete()){
    	return redirect('admin/user/danhsach')->with('thongbao','xoa thanh cong');
      }
     
      else{
        return redirect('admin/user/danhsach')->with('loi','xoa khong thanh cong');
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

