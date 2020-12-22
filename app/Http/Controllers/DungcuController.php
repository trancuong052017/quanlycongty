<?php

namespace App\Http\Controllers;
use App\Chitietdungcu;
use Illuminate\Support\Facades\Log;
use App\Dungcu ;
use App\User ;
use App\Congtrinh;
use App\DanhsachDungcu;
use Illuminate\Http\Request;
use DB; 
use File; 
use Illuminate\Support\Facades\Auth;
class DungcuController extends Controller
{   //////////////////////////////////////////
    public function getThem(){
        $user=User::find(Auth::user()->id);
       $congtrinh = $user->congtrinh;
       //dd($congtrinh);
       $danhsachdungcu=DanhsachDungcu::all() ;
    	return view('admin.dungcu.them',compact('congtrinh','danhsachdungcu','user'));
    }
    /////////////////////////////////////
    /* public function postThem(Request $request){
      if($request->soluong<=0){return redirect('admin/dungcu/them')->with('loi','chưa  nhập số lượng');}

     	$this->validate($request ,
     		[ 'madungcu'=>'required|numeric',
           //'iduser'=>'required', 
          'idcongtrinh'=>'required|numeric',
          'anh'=>'required',
          'ngaychuyen'=>'required',
     		  //'nguoinhan'=>'required',
          'nguoigiao'=>'required',
         //'anhdovat'=>'required',
          'soluong'=>'required',
     		],
     		[  //'iduser.required'=>'chưa chọn người nhận',
     		  'idcongtrinh.numeric'=>'chưa chọn tên công trinh ',
          'anh.required'=>'ban chua chọn ảnh  ',
          'ngaychuyen.required'=>'chưa chọn ngày chuyển',
     		  'madungcu.numeric'=>'chưa chọn dụng cụ ',
          'nguoigiao.required'=>'chua nhap ten nguoi giao ',
          'soluong.required'=>'chua nhap soluong',
          'madungcu.required'=>'chua chon ten dung cu',
         
     		]);
          $iduser =Auth::user()->id;

         $dungcu =Dungcu::where('iduser',$iduser)->where('madungcu',$request->madungcu)->where('idcongtrinh',$request->idcongtrinh)->first();
         //dd($dungcu);
 if($dungcu)
  {
         //try{
           if($request->hasFile('anh')){
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/dungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,40)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,40).'_'.$name;
                }
                $file->move("public/upload/dungcu",$Hinh);
                $request->anh =$Hinh;

              }
           
          
           $tencongtrinh=Congtrinh::find($request->idcongtrinh);
          $dungcu->tencongtrinh=$tencongtrinh->ten;
          $request->soluong =str_replace(',','', $request->soluong);
          $dungcu->soluong=$dungcu->soluong +$request->soluong;
          $dungcu->nguoinhan =Auth::user()->name;
          $dungcu->nguoigiao =$request->nguoigiao ;
          $dungcu->ngaychuyen=$request->ngaychuyen;
          $dungcu->anh=$request->anh;
          $danhsachdungcu=DanhsachDungcu::find($request->madungcu);
          $dungcu->anhdovat=$danhsachdungcu->anh;
     try {
          $dungcu->save();

          $chitietdungcu=new Chitietdungcu;  
           
          $chitietdungcu->tencongtrinh=$tencongtrinh->ten;
          $request->soluong =str_replace(',','', $request->soluong);
          $chitietdungcu->soluong=$request->soluong;
          $chitietdungcu->nguoinhan =Auth::user()->name;
          $chitietdungcu->nguoigiao =$request->nguoigiao ;
          $chitietdungcu->ngaychuyen=$request->ngaychuyen; 
          $chitietdungcu->idcongtrinh=$request->idcongtrinh;
          $chitietdungcu->iduser=Auth::user()->id;
          $chitietdungcu->madungcu=$request->madungcu;
          $chitietdungcu->ten=$danhsachdungcu->ten;
         $chitietdungcu->anhdovat=$danhsachdungcu->anh;
         $chitietdungcu->anh=$request->anh;
         $chitietdungcu->save();
           DB::commit();
      return redirect('admin/dungcu/them')->with('thongbao','them thanh cong');
          
          }
         catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
      }
else {   
         if($request->hasFile('anh')){
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/dungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,40)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,40).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu",$Hinh);
                $request->anh =$Hinh;

              }
          
        $congtrinh=Congtrinh::find($request->idcongtrinh);
         $dungcu = new dungcu ;
         $dungcu->anh =$request->anh;
         $dungcu->nguoinhan  =Auth::user()->name;
         $dungcu->ngaychuyen =$request->ngaychuyen;
        $dungcu->nguoigiao  =$request->nguoigiao ;
        
        $request->soluong =str_replace(',','', $request->soluong);
          $dungcu->soluong=$request->soluong;
        
      
         $dungcu->madungcu  =$request->madungcu ; 
        $dungcu->idcongtrinh =$request->idcongtrinh;
        $dungcu->iduser=Auth::user()->id;
        $tencongtrinh=Congtrinh::find($request->idcongtrinh);
        $dungcu->tencongtrinh=$tencongtrinh->ten;
        $dungcu->anhdovat =DanhsachDungcu::find($request->madungcu)->anh ;
        $tendungcu=DanhsachDungcu::find($request->madungcu);
        $dungcu->ten=$tendungcu->ten;
     	 try{
          $dungcu->save();
          $chitietdungcu=new Chitietdungcu;  
          $chitietdungcu->tencongtrinh=$tencongtrinh->ten;
          $request->soluong =str_replace(',','', $request->soluong);
          $chitietdungcu->soluong=$request->soluong;
          $chitietdungcu->nguoinhan =Auth::user()->name;
          $chitietdungcu->nguoigiao =$request->nguoigiao ;
          $chitietdungcu->ngaychuyen=$request->ngaychuyen; 
          $chitietdungcu->idcongtrinh=$request->idcongtrinh;
          $chitietdungcu->iduser=Auth::user()->id;
          $chitietdungcu->madungcu=$request->madungcu;
          $danhsachdc=DanhsachDungcu::find($request->madungcu);
          $chitietdungcu->ten=$danhsachdc->ten;
          
         $chitietdungcu->anhdovat=$danhsachdc->anh;
         $chitietdungcu->anh=$request->anh;
         $chitietdungcu->save();
         DB::commit();
          return redirect('admin/dungcu/them')->with('thongbao','them thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
  }*/
        //////////////////////////////////////////
    
     public function getDanhSach(){
        $user_login=Auth::user();
      $congtrinh=$user_login->congtrinh;
      $danhsachdungcu=DanhsachDungcu::all();
    	$dungcu= Dungcu::where('iduser', $user_login=Auth::user()->id)->orderByDesc('ngaychuyen')->paginate(5);;
      //dd($dungcu);
   return view('admin.dungcu.danhsach',compact('dungcu','congtrinh','danhsachdungcu'));
    }
    ///////////////////////////////////////

     public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        $madungcu=$request->madungcu;
        $idcongtrinh=$request->idcongtrinh;
        if($idcongtrinh){
        $tencongtrinh=Congtrinh::find($idcongtrinh)->ten;
         }
         else{$tencongtrinh='';}
         $danhsachdungcu=DanhsachDungcu::all();
        //$iduser_login=Auth::user()->id;
        //dd($hinhthuc);
        //dd($denngay);
       $user_login=Auth::user();  
      $congtrinh=$user_login->congtrinh;
     if($tungay&&$denngay&&$idcongtrinh&&$madungcu==null){ //dd('tungay den ngay');
     $dungcu =Dungcu::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychuyen', [$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
     //dd($dungcu);
      }
   
      elseif($madungcu&&$tungay==null&&$denngay==null&&$idcongtrinh==null) { 
      $dungcu =Dungcu::where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
       }
        elseif($tungay&&$denngay&&$idcongtrinh&&$madungcu) { 
       $dungcu =Dungcu::where('idcongtrinh',$idcongtrinh)->where('madungcu',$madungcu)->whereBetween('ngaychuyen',[$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
        
           }
            
          elseif($idcongtrinh&&$madungcu&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $dungcu =Dungcu::where('idcongtrinh',$idcongtrinh)->where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
       
           }
          elseif($idcongtrinh&&$madungcu==null&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $dungcu =Dungcu::where('idcongtrinh',$idcongtrinh)->orderByDesc('ngaychuyen')->paginate(5);
       
           }  
    
       else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/dungcu/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/dungcu/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       if($madungcu){
      $tendungcu =DanhsachDungcu::find($madungcu)->ten;}
      else{$tendungcu ='';} 
    return view('admin.dungcu.timkiem',compact('dungcu','idcongtrinh','tencongtrinh','tungay','denngay','tendungcu','congtrinh','danhsachdungcu'));
    }
   
////////////////////////////////////////
     public function getSua($id){
     	$dungcu  = Dungcu::find($id);
        $congtrinh = $dungcu->congtrinh;
        //dd($congtrinh);
      $congtrinh =Congtrinh::where('id','<>',$congtrinh->id)->get();//khong lay 2 ra 
  
    return view('admin.dungcu.sua',compact('dungcu','congtrinh'));
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
       // dd($request->anh);
      
       $this->validate($request ,
        [ 
           'iduser'=>'required|numeric', 
          'idcongtrinh'=>'required|numeric',
          'anh'=>'required',
          'soluong'=>'required|numeric',
          //'nguoinhan'=>'required',
          'ngaychuyen'=>'required',
         ],
         ['iduser.required'=>'chưa chọn người nhận',
          'idcongtrinh.required'=>'chưa chọn tên công trinh',
          'iduser.numeric'=>'chưa chọn người nhận',
          'idcongtrinh.numeric'=>'chưa chọn tên công trinh',
          'anh.required'=>'bạn chưa chọn ảnh',
          //'nguoinhan.required'=>'chua nhap ten nguoi nhan',
          'soluong.required'=>'chua nhap soluong',
          'soluong.numeric'=>'số lượng phải là số ',
          'ngaychuyen.required'=>'chưa nhập ngày chuyển',
          ]);
       $dungcu_1=Dungcu::find($id);
      //$dungcu_1=Dungcu::find($id);
      $madungcu=$dungcu_1->madungcu;
      $dungcu=Dungcu::where('iduser',$request->iduser)->where('madungcu',$madungcu)->where('idcongtrinh',$request->idcongtrinh)->first();
   if($dungcu)
    {
     $request->soluong =str_replace(',','', $request->soluong);
     if($request->soluong<=0){return redirect('admin/dungcu/sua/'.$id)->with('loi','chưa  nhập số lượng');
       }
          $dungcu->soluong=$dungcu->soluong +$request->soluong;
          $dungcu_1->soluong=$dungcu_1->soluong -$request->soluong;
         
   if($dungcu_1->soluong<0)
          {
           
return redirect('admin/dungcu/sua/'.$id)->with('loi','số lượng xuất quá số lượng còn');
          }          
          $dungcu->nguoinhan=User::find($request->iduser)->name;
          $dungcu->nguoigiao=Auth::user()->name; 
     if($request->hasFile('anh'))
      {
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG')
          {
           return redirect('admin/dungcu/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
          }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,40)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,40).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu/",$Hinh);
                $request->anh =$Hinh;
                $dungcu->anh= $request->anh; 
               
           }
          
              
               $dungcu->ngaychuyen= $request->ngaychuyen; 
              
  //try {
         
          $chitietdungcu=new Chitietdungcu;  
          $tencongtrinh=Congtrinh::find($request->idcongtrinh);
          $chitietdungcu->tencongtrinh=$tencongtrinh->ten;
          $request->soluong =str_replace(',','', $request->soluong);
          $chitietdungcu->soluong=$request->soluong;
          $chitietdungcu->nguoigiao=Auth::user()->name;
          $chitietdungcu->nguoinhan=$dungcu->nguoinhan;
          $chitietdungcu->ngaychuyen=$request->ngaychuyen; 
          $chitietdungcu->idcongtrinh=$request->idcongtrinh;
          $chitietdungcu->iduser=$request->iduser;
          $chitietdungcu->madungcu=$dungcu_1->madungcu;
         
          $chitietdungcu->ten=$dungcu_1->ten;
          
            $chitietdungcu->anhdovat=$dungcu_1->anhdovat; 
            
               $chitietdungcu->anh=$request->anh;
               $chitietdungcu->save();
               $dungcu_1->save();
               $dungcu->save();
              // DB::commit();
      return redirect('admin/dungcu/sua/'.$id)->with('thongbao','chuyển  thành công');
       /* }
         
         catch(\Exception $exception)
         {
          DB::rollback();
          return redirect('admin/dungcu/sua/'.$id)->with('loi','có lỗi xảy ra');
          } */
         
     }
else { 
       if($request->hasFile('anh'))
      {
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG')
        {
           return redirect('admin/dungcu/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,40)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh))
            {
                $Hinh =random_int(4,40).'_'.$name;
            }
                $file->move("public/upload/danhsachdungcu/",$Hinh);
                $request->anh =$Hinh;
              
      }      
        $congtrinh=Congtrinh::find($request->idcongtrinh);
         $dungcu = new dungcu ;
         $dungcu->anh =$request->anh;
         $dungcu->nguoinhan =User::find($request->iduser)->name;
         $dungcu->ngaychuyen =$request->ngaychuyen;
        $dungcu->nguoigiao = Auth::user()->name; 
       
        $dungcu->anhdovat=$dungcu_1->anhdovat;
        $request->soluong =str_replace(',','', $request->soluong);
          $dungcu->soluong=$request->soluong;
         
          $dungcu_1->soluong=$dungcu_1->soluong -$request->soluong;

          if($dungcu_1->soluong<0){
           
 return redirect('admin/dungcu/sua/'.$id)->with('loi','số lượng xuất nhieu hon số lượng còn');
          }
      
         $dungcu->madungcu  =$dungcu_1->madungcu ; 
        $dungcu->idcongtrinh =$request->idcongtrinh;
        $dungcu->iduser=$request->iduser;
        $tencongtrinh=Congtrinh::find($request->idcongtrinh);
        $dungcu->tencongtrinh=$tencongtrinh->ten;
         $dungcu->ten=$dungcu_1->ten;
   // try{
        
         $chitietdungcu=new Chitietdungcu;  
          //$tencongtrinh=Congtrinh::find($request->idcongtrinh);
          $chitietdungcu->tencongtrinh=$tencongtrinh->ten;
          $request->soluong =str_replace(',','', $request->soluong);
          $chitietdungcu->soluong=$request->soluong;
          $chitietdungcu->nguoigiao=Auth::user()->name;
          $chitietdungcu->nguoinhan=$dungcu->nguoinhan;
          $chitietdungcu->ngaychuyen=$request->ngaychuyen; 
          $chitietdungcu->idcongtrinh=$request->idcongtrinh;
          $chitietdungcu->iduser=$request->iduser ;
          $chitietdungcu->madungcu=$dungcu_1->madungcu;
          $chitietdungcu->ten=$dungcu_1->ten;
          $chitietdungcu->anhdovat=$dungcu_1->anhdovat;
           $chitietdungcu->anh=$request->anh;
           $chitietdungcu->save();
            $dungcu_1->save();
            $dungcu->save();
           // DB::commit();
          return redirect('admin/dungcu/sua/'.$id)->with('thongbao','chuyển  thành công');
   /* }catch(\Exception $exception){
          DB::rollback();
         return redirect('admin/dungcu/sua/'.$id)->with('loi','có lỗi xảy ra');
        }*/
  }
}
        //////////////////////////////////////////
    
    	 public function getXoa($id){
    	 	$dungcu = Dungcu::find($id);
        //dd($dungcu);
        //xoa cac anh cua dungcu
      if($dungcu){
        $image_link = 'public/upload/dungcu/'.$dungcu->anh;
      //  $image_link1 = 'public/upload/dungcu/'.$dungcu->anhdovat;
        }
       
        try{
             
             $dungcu->delete();
           
             DB::commit();
    	return redirect('admin/dungcu/danhsach')->with('thongbao','xoa thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }

}
