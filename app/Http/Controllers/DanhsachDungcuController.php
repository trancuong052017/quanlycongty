<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\DanhsachDungcu;
use Illuminate\Http\Request;
use App\Congtrinh;
use DB;
use App\Dungcu;
use App\User;
use File;
class DanhsachDungcuController extends Controller
{  
    //////////////////////////////////////////
    public function getThem(){
    
    	return view('admin.danhsachdungcu.them');
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     //dd($request->all());
     	$this->validate($request ,
     		[ 'ten'=>'required|unique:danhsachdungcu,ten',
            'anh'=>'required',
           'soluong'=>'required',
           'ngaynhap'=>'required',
           'noidung'=>'required',
           'anhdovat'=>'required',
     		],
     	[    'soluong.required'=>'chưa nhập số lượng',
          'anh.required'=>'ban chua chọn ảnh',
          'ten.required'=>'chưa chọn ten ',
     		   'ten.unique'=>'tên loại dụng cu đã được sử dụng ',
           'ngaynhap.required'=>'chưa nhập ngày tháng',
           'noidung.required'=>'chua nhập nôi dung ',
           'anhdovat.required'=>'chưa nhập ảnh dụng cụ ',
     	]);
      
         if($request->hasFile('anh')){
          $file =$request->file('anh');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/danhsachdungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu",$Hinh);
                $request->anh =$Hinh;

              }
               if($request->hasFile('anhdovat')){
          $file =$request->file('anhdovat');
           //dd($file)
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/danhsachdungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu",$Hinh);
                $request->anhdovat =$Hinh;

              }
          try { DB::beginTransaction();   
          $danhsachdungcu = new DanhsachDungcu ;
         $danhsachdungcu->ngaynhap=$request->ngaynhap;
         $danhsachdungcu->noidung=$request->noidung;
         $danhsachdungcu->anh =$request->anh;
         $danhsachdungcu->anhdovat =$request->anhdovat;
         $danhsachdungcu->ten =$request->ten ;
         $request->soluong =str_replace(',','', $request->soluong);
         $danhsachdungcu->soluong =$request->soluong ;
         $danhsachdungcu->id_login=Auth::user()->id;
         $danhsachdungcu->save();
         $madungcu=$danhsachdungcu->id;
         //dd($madungcu);
         $dungcu = new Dungcu;
         $dungcu->anh =$request->anh;
         $dungcu->nguoinhan  =Auth::user()->name;
         $dungcu->ngaychuyen =$request->ngaynhap;
        //$dungcu->nguoigiao  =$request->nguoigiao ;
         $request->soluong =str_replace(',','', $request->soluong);
          $dungcu->soluong=$request->soluong;
        $dungcu->madungcu  =$madungcu ;
        $user= Auth::user();
        $congtrinh=$user->congtrinh->first();
        $dungcu->idcongtrinh =$congtrinh->id;
        $dungcu->iduser=Auth::user()->id;
        $tencongtrinh=Congtrinh::find($congtrinh->id);
        $dungcu->tencongtrinh=$tencongtrinh->ten;
        $dungcu->anhdovat =$request->anhdovat ;
        //dd($dungcu->anhdovat);
        $dungcu->ten=$request->ten;
        $dungcu->save();
        DB::commit();
         return redirect('admin/danhsachdungcu/them')->with('thongbao','them thanh cong');
          }catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/danhsachdungcu/them')->with('loi','đã có lỗi ');
        }
       }
        //////////////////////////////////////////
    
     public function getDanhSach(){
      $user=User::find(Auth::user()->id);
      
    	$danhsachdungcu= DanhsachDungcu::where('id_login',Auth::user()->id)->orderByDesc('ngaynhap')->paginate(8);
      //dd($danhsachdungcu);
   return view('admin.danhsachdungcu.danhsach',compact('danhsachdungcu'));
    }


    public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($tungay);
        $madungcu=$request->madungcu;
       
        $ten=$request->ten;
        //$iduser_login=Auth::user()->id;
        //dd($hinhthuc);
        //dd($denngay);
     
     if($tungay&&$denngay&&$madungcu==null){ //dd('tungay den ngay');
     $danhsachdungcu =DanhsachDungcu::whereBetween('ngaynhap', [$tungay,$denngay])->orderByDesc('ngaynhap')->paginate(5);
     
      }
   
      elseif($madungcu&&$tungay==null&&$denngay==null) { 
      $danhsachdungcu =DanhsachDungcu::where('id',$madungcu)->orderByDesc('ngaynhap')->paginate(5);
       
           }
          
         elseif($tungay&&$denngay&&$madungcu) { 
       $danhsachdungcu =DanhsachDungcu::where('id',$madungcu)->whereBetween('ngaynhap',[$tungay,$denngay])->orderByDesc('ngaynhap')->paginate(5);
        
           }
           
            
          elseif($ten&&$madungcu==null&&$tungay==null&&$denngay==null) { 
       
        $danhsachdungcu = DanhsachDungcu::where('ten','like',"%$ten%")->orderByDesc('ngaynhap')->paginate(5);
           }
         
    
       else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/danhsachdungcu/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/danhsachdungcu/danhsach')->
       with('loi','phải chọn  tìm kiếm');}
       }
       //dd($danhsachdungcu);
    return view('admin.danhsachdungcu.timkiem',compact('danhsachdungcu','ten','tungay','denngay','madungcu'));
    }
   
////////////////////////////////////////
    public function getSua($id){
     	$dungcu  = DanhsachDungcu::find($id);
       
    	return view('admin.danhsachdungcu.sua',compact('dungcu'));
    }
    /////////////////////////////////////////////////////
    public function postSua(Request $request ,$id){
       //dd($request->anhdovat) ;
        $danhsachdungcu = DanhsachDungcu::find($id);
        $this->validate($request ,
            [// 'ten'=>'required',
           // 'anh'=>'required',
           'soluong'=>'required',
          
        ],
      [    'soluong.required'=>'chưa nhập số lượng'
         // 'anh.required'=>'ban chua chọn ảnh',
          //'ten.required'=>'chưa chọn ten ',
           //'ten.unique'=>'tên loại dụng cu đã được sử dụng '
      ]);
        if($request->soluong<=0){return redirect('admin/danhsachdungcu/sua/'.$id)->with('loi','chưa  nhập số lượng');
       }
         if($request->hasFile('anh')){
          $file =$request->file('anh');
           //xoa anh cu
     $image_link = 'public/upload/danhsachdungcu/'.$danhsachdungcu->anh;
     //dd($image_link);
      if(File::exists($image_link))
        {
            File::delete($image_link);
            //dd($image_link);//
        }
        //dd($image_link);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/danhsachdungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu",$Hinh);
                $request->anh =$Hinh;
               $danhsachdungcu->anh =$request->anh;
               //dd( $danhsachdungcu->anh);
              }
              if($request->hasFile('anhdovat')){
          $file =$request->file('anhdovat');
           //dd($file);
          $image_link1 = 'public/upload/danhsachdungcu/'.$danhsachdungcu->anhdovat;
      if(File::exists($image_link1))
        {
            File::delete(($image_link1));
        }
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/danhsachdungcu/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/danhsachdungcu/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/danhsachdungcu",$Hinh);
                $request->anhdovat =$Hinh;
               $danhsachdungcu->anhdovat =$request->anhdovat;
               //dd( $danhsachdungcu->anh);
              }
              $dungcu=Dungcu::where('madungcu',$id)->where('iduser',Auth::user()->id)->first();
            if($request->soluong)
                {
                if($request->soluong>=$danhsachdungcu->soluong){
                  $soluongmoi=$request->soluong-$danhsachdungcu->soluong;
                  $dungcu->soluong=$dungcu->soluong+$soluongmoi;
                 }
                else{ $soluongmoi=$danhsachdungcu->soluong-
                    $request->soluong;
                    $dungcu->soluong=$dungcu->soluong-$soluongmoi;
                    if($dungcu->soluong<0)
                    {return redirect('admin/danhsachdungcu/sua/'.$id)->with('loi','số lượng thay đổi ít hơn số lượng dụng cụ đã chuyển đên các đơn vị ');

                     }
                   }
            
                }
            if($request->ten){
            $danhsachdungcu->ten =$request->ten;}
            if($request->soluong){
              $danhsachdungcu->soluong=$request->soluong;
             }

             if($request->ngaynhap){
              $danhsachdungcu->ngaynhap=$request->ngaynhap;
            }
            if($request->noidung){
              $danhsachdungcu->noidung=$request->noidung;
            }
           /* $dungcu=Dungcu::where('madungcu',$id)->where('iduser',Auth::user()->id)->first();*/
            //dd($request->anhdovat);
            $dungcu->anh =$danhsachdungcu->anh;
            if($request->anhdovat){
            $dungcu->anhdovat=$request->anhdovat;
            }
            //$dungcu->soluong=$dungcu->soluong+$soluongmoi;
            if($request->ten){
            $dungcu->ten =$request->ten;}
            
             if($request->ngaynhap){
              $dungcu->ngaychuyen=$request->ngaynhap;
            }
          try{
        //dd($danhsachdungcu);
         $danhsachdungcu->save();
          $dungcu->save();
         DB::commit();
          return redirect('admin/danhsachdungcu/sua/'.$id)->with('thongbao','sua  thanh cong');
                }catch(\Exception $exception){
          DB::rollback();
     return redirect('admin/danhsachdungcu/sua/'.$id)->with('loi','đã có lỗi ');
            }
    }
        //////////////////////////////////////////
       public function getXoa($id){
    	 	$danhsachdungcu = DanhsachDungcu::find($id);
       if($danhsachdungcu){
        //xoa cac anh cua danhsachdungcu
        $image_link = 'public/upload/danhsachdungcu/'.$danhsachdungcu->anh;
       try{
       
        if(File::exists($image_link))
        {
            File::delete(($image_link));
        }
         DB::commit();
        $danhsachdungcu->delete();
       return redirect('admin/danhsachdungcu/danhsach')->with('thongbao','xoa thanh cong');
       }catch(\Exception $exception){
          DB::rollback();
      return redirect('admin/danhsachdungcu/danhsach')->with('loi','đã có lỗi ');
        }
     } 
   }
}
