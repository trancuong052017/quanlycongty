<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Thu_congtrinh;
use App\Congtrinh;
//use DB;
//use File;
class ThuCongtrinhController extends Controller
{
    /* public function getThem(){
      $user_login=Auth::user();
      
      $congtrinh_user=$user_login->congtrinh ; 
  return view('admin.thucongtrinh.them',compact('congtrinh_user'));
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
         'ngaythu'=>'required'
         
     		  
     		],
     		['tien.required'=>'ban chua nhap so tien',
        'noidung.required'=>'ban chua nhap noi dung',
        'anh1.required'=>'ban chua nhap anh 1',
        'idcongtrinh.required'=>'chua co id cong trình',
        'iduser.required'=>'chua co id nguoi nhap',
        'ngaythu.required'=>'ban chua chon ngay',
        
     		//'Ten.unique'=>'ten khong duoc trung ',
     		  
     		]);
       //dd($request->hasFile('anh1'));
         if($request->hasFile('anh1')){
          $file =$request->file('anh1');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/thucongtrinh/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thucongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thucongtrinh",$Hinh);
                $request->anh1 =$Hinh;

              }
              if($request->hasFile('anh2')){
              $file =$request->file('anh2');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/thucongtrinh/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thucongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thucongtrinh",$Hinh);
                $request->anh2 =$Hinh;

              }
              $thucongtrinh = new Thu_congtrinh ;
              $user_login=Auth::user();
              //dd($user_login->id);
            $thucongtrinh->iduser_login =$user_login->id;
            $thucongtrinh->tien =$request->tien;
        
         $thucongtrinh->ngaythu =$request->ngaythu;
        $thucongtrinh->idcongtrinh =$request->idcongtrinh;

        $thucongtrinh->noidung =$request->noidung;
        
        $thucongtrinh->anh1 =$request->anh1;
      if($request->anh2){
         $thucongtrinh->anh2=$request->anh2;
        }
     	try{
         //dd($thucongtrinh);
         $thucongtrinh->save();
        
         DB::commit();
          return redirect('admin/thucongtrinh/them')->with('thongbao','them thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }*/
        //////////////////////////////////////////
    
    public function getDanhSach(){
      //dd('halo');
       $user_login=Auth::user();
       $id =$user_login->id ;

       $congtrinh=$user_login->congtrinh;
    	$thucongtrinh= Thu_congtrinh::where('iduser_login',$id)->where('hinhthuc','tiền_mặt')->orderBy('ngaythu','DESC')->paginate(5);
     $tong = $thucongtrinh->sum('tien');
       // dd($congtrinh);
   return view('admin.thucongtrinh.danhsach',compact('thucongtrinh','congtrinh','tong'));
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
       $thucongtrinh =Thu_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(1);
        $totall= Thu_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
          
          elseif($idcongtrinh&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $thucongtrinh =Thu_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->paginate(5);
       $totall= Thu_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/thucongtrinh/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/thucongtrinh/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.thucongtrinh.timkiem',compact('thucongtrinh','totall','congtrinh','tencongtrinh','tungay','denngay','idcongtrinh'));
    }
   
////////////////////////////////////////
/* public function getSua($id){
      	$thucongtrinh  = Thu_congtrinh::find($id);
        $user_login=Auth::user();
        $congtrinh_user=$user_login->congtrinh ; 
        
  return view('admin.thucongtrinh.sua',compact('congtrinh_user','thucongtrinh'));
    	
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
        $thucongtrinh=Thu_congtrinh::find($id);
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
         if($request->hasFile('anh1')){
          $file =$request->file('anh1');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/thucongtrinh/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thucongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thucongtrinh",$Hinh);
                $request->anh1 =$Hinh;

              }
              if($request->hasFile('anh2')){
              $file =$request->file('anh2');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/thucongtrinh/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thucongtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thucongtrinh",$Hinh);
                $request->anh2 =$Hinh;

              }
             
              $user_login=Auth::user();
              //dd($user_login->id);
            $thucongtrinh->iduser_login =$user_login->id;
            $thucongtrinh->tien =$request->tien;
       if($request->ngaythu){
         $thucongtrinh->ngaythu =$request->ngaythu;
         }
        $thucongtrinh->idcongtrinh =$request->idcongtrinh;

        $thucongtrinh->noidung =$request->noidung;
        if($request->anh1){
        if($thucongtrinh->anh1){
          $image_link1 = 'public/upload/thucongtrinh/'.$thucongtrinh->anh1;
          File::delete(($image_link1));
           }
         $thucongtrinh->anh1=$request->anh1;
        }
        
       
      if($request->anh2){
        if($thucongtrinh->anh2){
          $image_link2 = 'public/upload/thucongtrinh/'.$thucongtrinh->anh2;
          File::delete(($image_link2));
           }
         $thucongtrinh->anh2=$request->anh2;
        }
      try{
         //dd($thucongtrinh);
         $thucongtrinh->save();
        
         DB::commit();
          return redirect('admin/thucongtrinh/sua/'.$thucongtrinh->id)->with('thongbao','Sửa thành công');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
        //////////////////////////////////////////
    
    /* public function getDanhSach(){
        $congtrinh= Congtrinh::all();
   return view('admin.congtrinh.danhsach',compact('congtrinh'));
    }
    */
    
    	//////////////////////
    	 /*public function getXoa($id){
    	 	$thucongtrinh = Thu_congtrinh::find($id);
      
        //xoa cac anh cua san pham
        $image_link1 = 'public/upload/thucongtrinh/'.$thucongtrinh->anh1;
        //dd(strlen('public/upload/thucongtrinh'));
        
        if(File::exists($image_link1))
        {
            File::delete(($image_link1));
        }
        $image_link2 = 'public/upload/thucongtrinh/'.$thucongtrinh->anh2;
        if(File::exists($image_link2))
        {
            File::delete(($image_link2));
        }
       
        $thucongtrinh->delete();
      return redirect('admin/thucongtrinh/danhsach')->with('thongbao','xoa thanh cong');
    
    }*/
}
