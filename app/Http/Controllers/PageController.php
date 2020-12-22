<?php

namespace App\Http\Controllers;
use Illuminate\Support\collection;
use App\User;
use DB;
use Mail;
use App\Duan;
use App\TheLoai ;
use Illuminate\Http\Request;
use App\Slide ;
use App\Loaitin ;
use App\TinTuc ;
use App\Comment ;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{   
	function  __construct()
	{ 
	/*$slide= Slide::all();
    view()->share('slide',$slide);*///chuyen slide sang view	
    $theloai= TheLoai::all();
    view()->share('theloai',$theloai);//chuyen theloai sang tatca cac view khi goi pagecomtroller
     }
   function Trangchu(){
   $duanmoi =Duan::orderByDesc('ngaytao')->take(4)->get();//paginate(5);*/ //phan trang
$duan_tieubieu = Duan::where('noibat',1)->orderByDesc('ngaytao')->paginate(12);
    $danhmuc =Theloai::orderBy('id')->take(4)->get();          
   	return view('pages.trangchu',compact('duanmoi','duan_tieubieu','danhmuc'));
   }
   function Lienhe(){
   
   	return view('pages.lienhe');
   }
    function postLienhe(){
   
    return view('pages.lienhe');
   }
    function Gioithieu(){
   
    return view('pages.gioithieu');
   }
   function Dichvu(){
   
    return view('pages.dichvu');
   }
   function Tuyendung(){
   
    return view('pages.tuyendung');
   }
    function Test(){
   
    return view('pages.test');
   }
   function Tintuc1(){
   
    return view('pages.tintuc1');
   }
   function Tintuc2(){
   
    return view('pages.tintuc2');
   }
   function Tintuc3(){
   
    return view('pages.tintuc3');
   }
   function Tintuc4(){
   
    return view('pages.tintuc4');
   }
    function Du_an(){
     
     
    $duan = Duan::orderBy('id', 'desc')->paginate(12);
            
       //dd($duan);
    return view('pages.duan',compact('duan'));
   }
    function Chitiet_duan($id){
     $chitiet=Duan::find($id);
      $chitiet->luotxem =  $chitiet->luotxem+1;
     $chitiet->save(); 
    $duan = Duan::orderBy('id', 'desc')->paginate(8);
    
    return view('pages.chitiet_duan',compact('duan','chitiet'));
   }
    function Duan($TieuDeKhongDau,$id){
    	$tentheloai=Theloai::find($id)->Ten;
      //dd($tentheloai);
    	$theloai =Theloai::orderBy('id')->take(4)->get();
    	$duanmoi =Duan::where('id_theloai',$id)->orderByDesc('ngaytao')->take(4)->get();//paginate(5);*/ //phan trang
    $duan = Duan::where('id_theloai',$id)->orderBy('id', 'desc')->paginate(12);
            
       //dd($duan);
   	return view('pages.danhsach_duan',compact('duanmoi','duan','theloai','tentheloai'));
   }
   function theLoai($TenKhongDau,$id){
      $collection = collect([]);
      $theloai = TheLoai::find($id);
      //dd($theloai);
      //$tintuc= $theloai->tintuc->where('id','=',2);
      //dd($tintuc);
     $tintuc= $theloai->tintuc;
    $collection = collect($tintuc);
    $sorted = $collection->sortByDesc('created_at');
    $tintuc=$sorted->values()->take(30);
    
    return view('pages.theloai',['loaitin' =>$theloai,'tintuc'=>$tintuc]);
   }
   function TinTuc($TieuDeKhongDau,$id){

    	 $idTinTuc = $id ;
       $binhluan = Comment::where('idTinTuc',$idTinTuc)->get() ;
       //dd($binhluan);
    	$tintuc = TinTuc::find($id);
    	$tinnoibat =TinTuc::where('NoiBat',1)->orderByDesc('created_at'); //phan trang->take(5)->get(); //phan trang
        $tinlienquan =TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->orderByDesc('created_at')->take(5)->get(); 
   	return view('pages.tintuc',['tinnoibat' =>$tinnoibat ,'tintuc'=>$tintuc ,'tinlienquan'=>$tinlienquan ,'binhluan'=>$binhluan]);
   }
   function dangxuat(){
     Auth::logout();
    session()->flush();//xoa session
    //dd(session('user'));
    return redirect('/trangchu');
   }

    function postBinhLuan($id ,Request $request){

       $tintuc = TinTuc::find($id);
        $binhluan =new Comment;
       $binhluan->NoiDung = $request->NoiDung ;
       $binhluan->idTinTuc = $tintuc->id;
       $binhluan->idUser =session('user')->id ;
      // dd($binhluan);
       $binhluan->save();
    return redirect('tintuc/'.$tintuc->TieuDeKhongDau.'.'.$id.'.html')->with('thongbao','binh luan thanh cong');
   }
 function getTimKiemPage(Request $request){
 $tukhoa =$request->tukhoa ;
  $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(40)->paginate(6);
  //dd($tintuc);
  return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
 }


     public function getquen_mat_khau(){
    return view('pages.quenmatkhau');
     
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
        Mail::send('admin.guimail.mail_nhan',$data, function($message) use($to_mail,$tieude){
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

 
}
