<?php

namespace App\Http\Controllers;
use App\slide;
use App\Menu;
use Illuminate\Http\Request;
use App\products;
use App\User;
use App\Jidlo;
use DB;
use Mail;
class PageController extends Controller
{    function  __construct()
    { 
     
    $theloai= Menu::all();    //dd($theloai);
    view()->share('menu',$theloai);//chuyen theloai sang tatca cac view khi goi pagecomtroller
     }

     public function getquen_mat_khau(){
    return view('page.quenmatkhau');
     
     }
       public function postquen_mat_khau(Request $request){
     $user=User::where('email',$request->email)->first();
     if($user!=null){
        $tieude='lấy lại mật khẩu';
        $so =rand(1000, 100000);
        //dd($so);

         $data =[
         'noidung'=>'đây là mật khẩu mới của bạn : '.$so ,
        ];
       
        
          
          $to_mail=$user->email;
      } 
      else{ return redirect('quenmatkhau')->with('loi','không đúng email ');
         }
        try{
         DB::beginTransaction();
         $password=bcrypt($so);
         $user->password=$password;
         $user->save();
        Mail::send('page.mail_nhan',$data, function($message) use($to_mail,$tieude){
            $message->from('trancuong052017@gmail.com', 'cuong gui');
            
            $message->to($to_mail);
            $message->subject($tieude);
          
        });
         
        
        
          DB::commit();
        return redirect('admin/dangnhap')->with('thongbao','bạn hãy đăng nhập theo mật khẩu được gưi qua email ');
         }
         catch(\Exception $exception){
            DB::rollback();
           return redirect('page.quenmatkhau')->with('loi','gui khong thanh cong');
         }

     }

    //return view('admin.dangnhap');
     
     
    public function domu(){
    	
     return view('page.trangchu');
    
    }
    public function menu(){
        
     return view('page.mon_an');
    
    }
     public function otevira(){
        
     return view('page.index1');
    
    }
    public function rozvoz(){
    	
     return view('page.index2');
    }
   public function jidelni(){
  
     return view('page.index3');
   }
    
    public function fotky(){
     return view('page.index4');

    }
     public function kontakt(){
     return view('page.index5');
    }
     public  function getJidlo($tenkhongdau,$id){
    $jidlo =Jidlo::where('id_menu',$id)->get();
    //dd($jidlo);
    $name_menu=Menu::find($id)->name;
 return view('page.mon_an',compact('jidlo','name_menu'));
 
  }
   
}
