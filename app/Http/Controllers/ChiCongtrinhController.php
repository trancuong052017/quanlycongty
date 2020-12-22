<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Chi_congtrinh;
use App\Congtrinh;
use App\Thu_congtrinh;
use DB;
use File;
class ChiCongtrinhController extends Controller
{
     public function getThem(){
      $user_login=Auth::user();
      
      $congtrinh_user=$user_login->congtrinh ; 
  return view('admin.chicongtrinh.them',compact('congtrinh_user'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
        $request->tien =str_replace(',','', $request->tien);
        //dd($request->tien);
     	$this->validate($request ,
     		[
         'tien'=>'required',
         'noidung'=>'required',
         'anh1'=>'required',
         'idcongtrinh'=>'required',
         'ngaychi'=>'required'
         
     		  
     		],
     		['tien.required'=>'ban chua nhap so tien',
        'noidung.required'=>'ban chua nhap noi dung',
        'anh1.required'=>'ban chua nhap anh 1',
        'idcongtrinh.required'=>'chua co id cong trình',
        'iduser.required'=>'chua co id nguoi nhap',
        'ngaychi.required'=>'ban chua chon ngay',
        
     		//'Ten.unique'=>'ten khong duoc trung ',
     		  
     		]);
       //dd($request->hasFile('anh1'));
         if($request->hasFile('anh1')){
          $file =$request->file('anh1');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/chicongtrinh/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/chicongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/chicongtrinh",$Hinh);
                $request->anh1 =$Hinh;

              }
              
              $chicongtrinh = new chi_congtrinh ;
              $user_login=Auth::user();
              //dd($user_login->id);
            $chicongtrinh->iduser_login =$user_login->id;
            $chicongtrinh->tien =$request->tien;
        
         $chicongtrinh->ngaychi =$request->ngaychi;
        $chicongtrinh->idcongtrinh =$request->idcongtrinh;

        $chicongtrinh->noidung =$request->noidung;
        
        $chicongtrinh->anh1 =$request->anh1;
      
     	try{
         //dd($chicongtrinh);
         $chicongtrinh->save();
        
         DB::commit();
          return redirect('admin/chicongtrinh/them')->with('thongbao','them thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/chicongtrinh/them')->with('loi','them khong thanh cong');
        }
    }
        //////////////////////////////////////////
    
    public function getDanhSach(){
      //dd('halo');
       $user_login=Auth::user();
       $congtrinh=$user_login->congtrinh;
       $id =$user_login->id ;
    $chicongtrinh= Chi_congtrinh::where('iduser_login',$id)->orderBy('ngaychi','DESC')->paginate(6);
     $tongchi  =Chi_congtrinh::where('iduser_login',$id)->sum('tien');
     $tongthu =Thu_congtrinh::where('iduser_login',$id)->where('hinhthuc','tien_mat')->sum('tien');
     $tongcon=$tongthu-$tongchi;
   return view('admin.chicongtrinh.danhsach',compact('chicongtrinh','congtrinh','tongchi','tongthu','tongcon'));
    }

     public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        //$id=$request->id;
        $idcongtrinh=$request->idcongtrinh;
        if($idcongtrinh){
        $tencongtrinh=Congtrinh::find($idcongtrinh)->ten;
         }
         else{$tencongtrinh='';}
        
        $idnguoichi=Auth::user()->id;
        
       $user_login=Auth::user();
       $congtrinh=$user_login->congtrinh;
     
         if($tungay&&$denngay&&$idcongtrinh) { 
       $chicongtrinh =Chi_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(6);
        $totall= Chi_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
          
          elseif($idcongtrinh&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $chicongtrinh =Chi_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->paginate(6);
       $totall= Chi_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/chicongtrinh/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/chicongtrinh/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.chicongtrinh.timkiem',compact('chicongtrinh','totall','congtrinh','tencongtrinh','tungay','denngay','idcongtrinh'));
    }
   
////////////////////////////////////////
 public function getSua($id){
      	$chicongtrinh  = Chi_congtrinh::find($id);
        $user_login=Auth::user();
        $congtrinh_user=$user_login->congtrinh ; 
        
  return view('admin.chicongtrinh.sua',compact('congtrinh_user','chicongtrinh'));
    	
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
        $chicongtrinh=Chi_congtrinh::find($id);
        $request->tien =str_replace(',','', $request->tien);
        //dd($request->tien);
      $this->validate($request ,
        [
         'tien'=>'required',
         'noidung'=>'required',
         
         'idcongtrinh'=>'required',
         
         
          
        ],
        ['tien.required'=>'ban chua nhap so tien',
        'noidung.required'=>'ban chua nhap noi dung',
        
        'idcongtrinh.required'=>'chua co id cong trình',
        'iduser.required'=>'chua co id nguoi nhap',
        
        
        //'Ten.unique'=>'ten khong duoc trung ',
          
        ]);
       //dd($request->hasFile('anh1'));
      //try{
         if($request->hasFile('anh1')){
          $file =$request->file('anh1');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/chicongtrinh/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/chicongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/chicongtrinh",$Hinh);
                $request->anh1 =$Hinh;

              }
              if($request->hasFile('anh2')){
              $file =$request->file('anh2');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/chicongtrinh/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/chicongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/chicongtrinh",$Hinh);
                $request->anh2 =$Hinh;

              }
             
              $user_login=Auth::user();
              //dd($user_login->id);
            $chicongtrinh->iduser_login =$user_login->id;
            $chicongtrinh->tien =$request->tien;
       if($request->ngaychi){
         $chicongtrinh->ngaychi =$request->ngaychi;
         }
        $chicongtrinh->idcongtrinh =$request->idcongtrinh;

        $chicongtrinh->noidung =$request->noidung;
        if($request->anh1){
        if($chicongtrinh->anh1){
          $image_link1 = 'public/upload/chicongtrinh/'.$chicongtrinh->anh1;
          File::delete(($image_link1));
           }
         $chicongtrinh->anh1=$request->anh1;
        }
        
        try{
         //dd($chicongtrinh);
         $chicongtrinh->save();
        
         DB::commit();
          return redirect('admin/chicongtrinh/sua/'.$chicongtrinh->id)->with('thongbao','Sửa thành công');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
      //////////////////////
    	 public function getXoa($id){
    	 	$chicongtrinh = Chi_congtrinh::find($id);
     
        //xoa cac anh cua san pham
        $image_link1 = 'public/upload/chicongtrinh/'.$chicongtrinh->anh1;
        //dd(strlen('public/upload/chicongtrinh'));
        
        if(File::exists($image_link1))
        {
            File::delete(($image_link1));
        }
        $image_link2 = 'public/upload/chicongtrinh/'.$chicongtrinh->anh2;
        if(File::exists($image_link2))
        {
            File::delete(($image_link2));
        }
       
        $chicongtrinh->delete();
      return redirect('admin/chicongtrinh/danhsach')->with('thongbao','xoa thanh cong');
    
    }
}
