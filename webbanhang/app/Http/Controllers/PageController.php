<?php

namespace App\Http\Controllers;
use App\slide;
use Illuminate\Http\Request;
use App\products;
use App\User;
use DB;
use Mail;
class PageController extends Controller
{    

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
     
     
    public function getIndex($value=''){
    	$slide=slide::all();
    	 $product_new=products::where('new',1)->take(16)->get();
    	 $product_top =products::orderByDesc('created_at')->take(8)->get();
     return view('page.trangchu',compact('slide','product_new','product_top'));
    
    }
    public function getLoaiSanPham($type){
    	$loai_sp =products::where('id_type',$type)->get();
     return view('page.loaisanpham',compact('loai_sp'));
    }
   public function getSanPham($id){
   	$sanpham=products::find($id);
     return view('page.san-pham',compact('sanpham'));
   }
    
    public function getLienHe($value=''){
     return view('page.lien-he');

    }
     public function getGioiThieu($value=''){
     return view('page.gioi-thieu');
    }
   
}
