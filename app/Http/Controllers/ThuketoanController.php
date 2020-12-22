<?php

namespace App\Http\Controllers;

use DB ; 
use Illuminate\Http\Request;
use App\Thuketoan;
use App\Congtrinh;
use Illuminate\Support\Facades\Auth;
use App\Chiketoan ;
use File;
class ThuketoanController extends Controller
{
     public function getThem(){
      $nguoithu =Auth::user()->name;
      $congtrinh =Congtrinh::all();
  return view('admin.thuketoan.them',compact('nguoithu','congtrinh'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
        $request->tien =str_replace(',','', $request->tien);
        //dd($request->tien);
     	$this->validate($request ,
     		[
         'tien'=>'required',
         'noidung'=>'required',
         'anh'=>'required',
         'nguoithu'=>'required',
         'idcongtrinh'=>'required',
         'ngaythu'=>'required'
         
     		  
     		],
     		['tien.required'=>'chưa nhập tiền ',
        'noidung.required'=>'chưa nhập nội dung ',
        'anh.required'=>'ban chưa nhập ảnh hóa đơn',
        'idcongtrinh.required'=>'chưa chọn công trình',
        
        'ngaythu.required'=>'ban chưa chọn ngày thu ',
        
        
     		//'Ten.unique'=>'ten khong duoc trung ',
     		  
     		]);
       //dd($request->hasFile('anh1'));
      if($request->tien<=0){  return redirect('admin/thuketoan/them')->with('loi','chưa nhập số tiền,hoặc tiền không đúng đinh dạng ');}
         if($request->hasFile('anh')){
          $file =$request->file('anh');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/thuketoan/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thuketoan/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thuketoan",$Hinh);
                $request->anh =$Hinh;

              }
              
              $thuketoan = new Thuketoan ;
              $user_login=Auth::user();
              //dd($user_login->id);
        $thuketoan->iduser_login =$user_login->id;
        $thuketoan->tien =$request->tien;
        $thuketoan->nguoithu=$user_login->name;
        $thuketoan->ngaythu =$request->ngaythu;
        $thuketoan->idcongtrinh =$request->idcongtrinh;

        $thuketoan->noidung =$request->noidung;
        
        $thuketoan->anh =$request->anh;
        //sua bang congtrinh 
        $congtrinh =Congtrinh::find($request->idcongtrinh);
        $congtrinh->tiendathu=$congtrinh->tiendathu +$request->tien;
        $congtrinh->tienconno=$congtrinh->vondautu-$congtrinh->tiendathu;
         DB::beginTransaction();
     	try{
         
         $thuketoan->save();
         $congtrinh->save();
         DB::commit();
          return redirect('admin/thuketoan/them')->with('thongbao','them thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
           return redirect('admin/thuketoan/them')->with('loi','Đã có lỗi '); 
        }
    }
        //////////////////////////////////////////
    
    public function getDanhSach(){
      //dd('halo');
       $user_login=Auth::user();
       $id =$user_login->id ;
        $congtrinh=Congtrinh::all();
    	$thuketoan= Thuketoan::where('iduser_login',$id)->orderBy('ngaythu','DESC')->paginate(8);
     $tongthu = Thuketoan::where('iduser_login',$id)->sum('tien');
      $tongchi = Chiketoan::where('idnguoichi',$id)->sum('tien');
     $tongcon= $tongthu - $tongchi ;
   return view('admin.thuketoan.danhsach',compact('thuketoan','congtrinh','tongthu','tongchi','tongcon'));
    }
     public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        $id=$request->id;
        $idcongtrinh=$request->idcongtrinh;
        if($idcongtrinh){
        $tencongtrinh=Congtrinh::find($idcongtrinh)->ten;
         }
         else{$tencongtrinh='';}
        
        $idnguoithu=Auth::user()->id;
        //dd($hinhthuc);
        //dd($denngay);
      $congtrinh=Congtrinh::all();
     if($tungay&&$denngay&&$idcongtrinh==null){ //dd('tungay den ngay');
     $thuketoan =Thuketoan::where('iduser_login',$idnguoithu)->whereBetween('ngaythu', [$tungay,$denngay])->orderByDesc('ngaythu')->paginate(5);
      $totall= Thuketoan::where('iduser_login',$idnguoithu)->whereBetween('ngaythu',[$tungay,$denngay])->sum('tien');
      }
   
      elseif($id) { 
       $thuketoan =Thuketoan::where('iduser_login',$idnguoithu)->where('id',$id)->paginate(5);
       $totall =Thuketoan::where('iduser_login',$idnguoithu)->where('id',$id)->sum('tien');
           }
          
         elseif($tungay&&$denngay&&$idcongtrinh) { 
       $thuketoan =Thuketoan::where('iduser_login',$idnguoithu)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(5);
        $totall= Thuketoan::where('iduser_login',$idnguoithu)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
            
          elseif($idcongtrinh&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $thuketoan =Thuketoan::where('iduser_login',$idnguoithu)->where('idcongtrinh',$idcongtrinh)->paginate(5);
       $totall= Thuketoan::where('iduser_login',$idnguoithu)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
       else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/thuketoan/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/thuketoan/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.thuketoan.timkiem',compact('thuketoan','totall','congtrinh','tencongtrinh','tungay','denngay','hinhthuc','idcongtrinh'));
    }
   
////////////////////////////////////////
 public function getSua($id){
      	$thuketoan  = Thu_congtrinh::find($id);
        $user_login=Auth::user();
        $congtrinh_user=$user_login->congtrinh ; 
        
  return view('admin.thuketoan.sua',compact('congtrinh_user','thuketoan'));
    	
    }
    /////////////////////////////////////////////////////
     /*public function postSua(Request $request ,$id){
        $thuketoan=Thu_congtrinh::find($id);
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
           return redirect('admin/thuketoan/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thuketoan/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thuketoan",$Hinh);
                $request->anh1 =$Hinh;

              }
              if($request->hasFile('anh2')){
              $file =$request->file('anh2');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/thuketoan/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/thuketoan/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/thuketoan",$Hinh);
                $request->anh2 =$Hinh;

              }
             
              $user_login=Auth::user();
              //dd($user_login->id);
            $thuketoan->iduser_login =$user_login->id;
            $thuketoan->tien =$request->tien;
       if($request->ngaythu){
         $thuketoan->ngaythu =$request->ngaythu;
         }
        $thuketoan->idcongtrinh =$request->idcongtrinh;

        $thuketoan->noidung =$request->noidung;
        if($request->anh1){
        if($thuketoan->anh1){
          $image_link1 = 'public/upload/thuketoan/'.$thuketoan->anh1;
          File::delete(($image_link1));
           }
         $thuketoan->anh1=$request->anh1;
        }
        
       
      if($request->anh2){
        if($thuketoan->anh2){
          $image_link2 = 'public/upload/thuketoan/'.$thuketoan->anh2;
          File::delete(($image_link2));
           }
         $thuketoan->anh2=$request->anh2;
        }
      try{
         //dd($thuketoan);
         $thuketoan->save();
        
         DB::commit();
          return redirect('admin/thuketoan/sua/'.$thuketoan->id)->with('thongbao','Sửa thành công');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }*/
      //////////////////////
    	 public function getXoa($id){
    	 	$thuketoan = Thuketoan::find($id);
       $congtrinh =Congtrinh::find($thuketoan->idcongtrinh); $congtrinh->tiendathu=$congtrinh->tiendathu-$thuketoan->tien ;
       //dd($congtrinh->tiendathu);
       $congtrinh->tienconno=$congtrinh->vondautu-$congtrinh->tiendathu ;
     //dd($congtrinh->tienconno);
       try{ 
          //dd($congtrinh->tienconno);
           $thuketoan->delete();
           $congtrinh->save();
           //dd($thuketoan);
        //xoa cac anh cua san pham
        $image_link1 = 'public/upload/thuketoan/'.$thuketoan->anh;
        //dd(strlen('public/upload/thuketoan'));
        
        if(File::exists($image_link1))
        {
            File::delete(($image_link1));
        }
         
         return redirect('admin/thuketoan/danhsach')->with('thongbao','xoa thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
          return redirect('admin/thuketoan/danhsach ')->with('loi','Đã có lỗi '); 
        }
     
    
    }
}
