<?php

namespace App\Http\Controllers;
use App\ChitietDanhsachDungcu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Congtrinh;
use DB;
use File;
class ChitietDanhsachDungcuController extends Controller
{
    public function getDanhsach(){
      $congtrinh =Congtrinh::all();
 $chitietdanhsachdungcu=ChitietDanhsachDungcu::orderByDesc('ngaychuyen')->paginate(5);
    //dd($chitietdanhsachdungcu);
    return view('admin.chitietdanhsachdungcu.danhsach',compact('chitietdanhsachdungcu','congtrinh'));
    }
     public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($tungay);
        $madungcu=$request->madungcu;
        $idcongtrinh=$request->idcongtrinh;
        if($idcongtrinh){
        $tencongtrinh=Congtrinh::find($idcongtrinh)->ten;
         }
         else{$tencongtrinh='';}
        
        //$iduser_login=Auth::user()->id;
        //dd($hinhthuc);
        //dd($denngay);
      $congtrinh=Congtrinh::all();
     if($tungay&&$denngay&&$idcongtrinh==null&&$madungcu==null){ //dd('tungay den ngay');
     $chitietdanhsachdungcu =ChitietDanhsachDungcu::whereBetween('ngaychuyen', [$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
     
      }
   
      elseif($madungcu&&$tungay==null&&$denngay==null&&$idcongtrinh==null) { 
      $chitietdanhsachdungcu =Chitietdanhsachdungcu::where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
       
           }
          
         elseif($tungay&&$denngay&&$idcongtrinh&&$madungcu==null) { 
       $chitietdanhsachdungcu =Chitietdanhsachdungcu::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychuyen',[$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
        
           }
            elseif($tungay&&$denngay&&$idcongtrinh&&$madungcu) { 
       $chitietdanhsachdungcu =Chitietdanhsachdungcu::where('idcongtrinh',$idcongtrinh)->where('madungcu',$madungcu)->whereBetween('ngaychuyen',[$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
        
           }
            
          elseif($idcongtrinh&&$madungcu&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $chitietdanhsachdungcu =Chitietdanhsachdungcu::where('idcongtrinh',$idcongtrinh)->where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
       
           }
          elseif($idcongtrinh&&$madungcu==null&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $chitietdanhsachdungcu =Chitietdanhsachdungcu::where('idcongtrinh',$idcongtrinh)->orderByDesc('ngaychuyen')->paginate(5);
       
           }  
    
       else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/chitietdanhsachdungcu/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/chitietdanhsachdungcu/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.chitietdanhsachdungcu.timkiem',compact('chitietdanhsachdungcu','congtrinh','tencongtrinh','tungay','denngay'));
    }
   
    
     public function getXoa($id){
    	 	$ctdsdungcu = ChitietDanhsachDungcu::find($id);
    // $image_link = 'public/upload/danhsachdungcu/'.$ctdsdungcu->anh;
        try {  
        /* if(File::exists($image_link))
        {
            File::delete(($image_link));
        } */
             
             $ctdsdungcu->delete();
            
             DB::commit();
    	return redirect('admin/chitietdanhsachdungcu/danhsach')->with('thongbao','xoa thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/chitietdanhsachdungcu/danhsach')->with('loi','đã có lỗi ');
        }
    }
}
