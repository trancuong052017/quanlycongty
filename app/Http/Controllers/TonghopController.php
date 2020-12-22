<?php

namespace App\Http\Controllers;
use App\User;
use App\Dungcu;
use App\DanhsachDungcu;
use App\Congtrinh;
use Illuminate\Http\Request;
use App\Chi_congtrinh;
use App\Thu_congtrinh;
use App\Thuketoan;
use App\Chiketoan;
class TonghopController extends Controller
{    
     public function getDanhSachDungcu(){
     // $user=User::find(Auth::user()->id);
     	$congtrinh=congtrinh::all();
    $dungcu= Dungcu::orderByDesc('ngaychuyen')->paginate(5);;
      $danhsachdungcu=DanhsachDungcu::all();
   return view('admin.tonghopdungcu.danhsach',compact('dungcu','congtrinh','danhsachdungcu'));
    }

     public function getTimkiemDungcu(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($tungay);
        $madungcu=$request->madungcu;
        if($madungcu){$tendungcu=DanhsachDungcu::find($madungcu)->ten;}
           else{$tendungcu='';}
        $idcongtrinh=$request->idcongtrinh;
        $congtrinh=Congtrinh::find($idcongtrinh);

        if($congtrinh){$tencongtrinh=$congtrinh->ten ;}
        else{$tencongtrinh='';}
        $congtrinh=Congtrinh::all();
        //dd($hinhthuc);
        //dd($denngay);
        $danhsachdungcu=DanhsachDungcu::all();
     if($tungay&&$denngay&&$madungcu==null&&$idcongtrinh==null){ //dd('tungay den ngay');
     $dungcu =Dungcu::whereBetween('ngaychuyen', [$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
      $totall =Dungcu::whereBetween('ngaychuyen', [$tungay,$denngay])->sum('soluong');
     
      }
   
      elseif($madungcu&&$tungay==null&&$denngay==null&&$idcongtrinh==null) { 
      $dungcu =Dungcu::where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
       $totall=Dungcu::where('madungcu',$madungcu)->sum('soluong');
       $soluongnhap=DanhsachDungcu::find($madungcu)->soluong;
       $soluongmat=$soluongnhap-$totall;
     // $tendungcu =DanhsachDungcu::find($madungcu)->ten;
           }
          
         elseif($tungay&&$denngay&&$madungcu&&$idcongtrinh==null) { 
       $dungcu =Dungcu::where('madungcu',$madungcu)->whereBetween('ngaychuyen',[$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
       $totall=Dungcu::where('madungcu',$madungcu)->whereBetween('ngaychuyen',[$tungay,$denngay])->sum('soluong');
           }
           
             elseif($tungay&&$denngay&&$madungcu&&$idcongtrinh) { 
       $dungcu =Dungcu::where('madungcu',$madungcu)->where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychuyen',[$tungay,$denngay])->orderByDesc('ngaychuyen')->paginate(5);
       $totall=Dungcu::where('madungcu',$madungcu)->where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychuyen',[$tungay,$denngay])->sum('soluong');
           }
            
          elseif($idcongtrinh&&$madungcu==null&&$tungay==null&&$denngay==null) { 
       
        $dungcu = Dungcu::where('idcongtrinh',$idcongtrinh)->orderByDesc('ngaychuyen')->paginate(5);
         $totall = Dungcu::where('idcongtrinh',$idcongtrinh)->sum('soluong');
           }
         
         elseif($idcongtrinh&&$madungcu&&$tungay==null&&$denngay==null) { 
        $totall=Dungcu::where('madungcu',$madungcu)->where('idcongtrinh',$idcongtrinh)->sum('soluong');
        $dungcu = Dungcu::where('idcongtrinh',$idcongtrinh)->where('madungcu',$madungcu)->orderByDesc('ngaychuyen')->paginate(5);
           }
         
       else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/tonghopdungcu/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/tonghopdungcu/danhsach')->
       with('loi','phải chọn  tìm kiếm');}
       }
       //dd($danhsachdungcu);
    return view('admin.tonghopdungcu.timkiem',compact('dungcu','tencongtrinh','tungay','denngay','tendungcu','congtrinh','danhsachdungcu','totall','soluongmat','madungcu','idcongtrinh'));
    }

    ////////////////////////////////

 public function getDanhSachChicongtrinh(){
      //dd('halo');
      
       $congtrinh=Congtrinh::all();
       
    	$chicongtrinh= Chi_congtrinh::orderBy('ngaychi','DESC')->paginate(4);
     $tong = Chi_congtrinh::sum('tien');
     //dd($tong);
   return view('admin.tonghopchicongtrinh.danhsach',compact('chicongtrinh','congtrinh','tong'));
    }

     public function getTimkiemChicongtrinh(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        //$id=$request->id;
         $congtrinh=Congtrinh::all();
        $idcongtrinh=$request->idcongtrinh;
    
        if($idcongtrinh){
        $congtrinh=Congtrinh::find($idcongtrinh);
        $tencongtrinh=$congtrinh->ten; 

         }
         else{$tencongtrinh='';}
          $congtrinh=Congtrinh::all();
         $idnguoichi=$request->id;
         if($tungay&&$denngay&&$idcongtrinh) { 
       $chicongtrinh =Chi_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(5);
        $totall= Chi_congtrinh::where('iduser_login',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
           elseif($tungay&&$denngay&&$idcongtrinh==null&&$idnguoichi==null) { 
       $chicongtrinh =Chi_congtrinh::whereBetween('ngaychi',[$tungay,$denngay])->paginate(5);
        $totall= Chi_congtrinh::whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
          elseif($idcongtrinh&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $chicongtrinh =Chi_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->paginate(5);
       $totall= Chi_congtrinh::where('iduser_login',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/tonghopchicongtrinh/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/tonghopchicongtrinh/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.tonghopchicongtrinh.timkiem',compact('chicongtrinh','totall','congtrinh','tencongtrinh','tungay','denngay','idcongtrinh'));
    }
   
 ////////////////////////////////

 public function getDanhSachThucongtrinh(){
      //dd('halo');
      
       $congtrinh=Congtrinh::all();
       
    	$thucongtrinh= Thu_congtrinh::orderBy('ngaythu','DESC')->paginate(4);
     $tongthu = Thu_congtrinh::sum('tien');
      $tongchi = Chi_congtrinh::sum('tien');
      $tongcon =$tongthu-$tongchi ;
     //dd($tong);
   return view('admin.tonghopthucongtrinh.danhsach',compact('thucongtrinh','congtrinh','tongthu','tongchi','tongcon'));
    }

     public function getTimkiemThucongtrinh(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        //$id=$request->id;
        $idcongtrinh=$request->idcongtrinh;

        if($idcongtrinh){
        $congtrinh=Congtrinh::find($idcongtrinh);
        $tencongtrinh=$congtrinh->ten; 

         }
         else{$tencongtrinh='';}
          $congtrinh=Congtrinh::all();
         $idnguoithu=$request->id;
         if($tungay&&$denngay&&$idcongtrinh&&$idnguoithu) { 
       $thucongtrinh =Thu_congtrinh::where('iduser_login',$idnguoithu)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(4);
        $totall= Thu_congtrinh::where('iduser_login',$idnguoithu)->whereBetween('ngaythu',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
           elseif($tungay&&$denngay&&$idcongtrinh==null&&$idnguoithu==null) { 
       $thucongtrinh =Thu_congtrinh::whereBetween('ngaythu',[$tungay,$denngay])->paginate(5);
        $totall= Thu_congtrinh::whereBetween('ngaythu',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
          elseif($idcongtrinh&&$idnguoithu&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $thucongtrinh =Thu_congtrinh::where('iduser_login',$idnguoithu)->where('idcongtrinh',$idcongtrinh)->paginate(4);
       $totall= Thu_congtrinh::where('iduser_login',$idnguoithu)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/tonghopthucongtrinh/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/tonghopthucongtrinh/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.tonghopthucongtrinh.timkiem',compact('thucongtrinh','totall','congtrinh','tencongtrinh','tungay','denngay','idcongtrinh'));
    }
  ////////////////////////////////

 public function getDanhSachChiketoan(){
      //dd('halo');
      
       $congtrinh=Congtrinh::all();
       
    	$chiketoan= Chiketoan::orderBy('ngaychi','DESC')->paginate(4);
     $tongchi  = Chiketoan::sum('tien');
      $tongthu  = Thuketoan::sum('tien');
      $tongcon =$tongthu - $tongchi ;
     //dd($tong);
   return view('admin.tonghopchiketoan.danhsach',compact('chiketoan','congtrinh','tongchi','tongcon','tongthu'));
    }

     public function getTimkiemChiketoan(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        $hinhthuc=$request->hinhthuc;
        $idcongtrinh=$request->idcongtrinh;

        if($idcongtrinh){
        $congtrinh=Congtrinh::find($idcongtrinh);
        $tencongtrinh=$congtrinh->ten; 

         }
         else{$tencongtrinh='';}
         $hinhthuc=$request->hinhthuc;
       if($hinhthuc){$hinhthuc=$hinhthuc ;}
        else{$hinhthuc='';}
          $congtrinh=Congtrinh::all();
        
         if($tungay&&$denngay&&$idcongtrinh&&$hinhthuc) { 
       $chiketoan =Chiketoan::where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->whereBetween('ngaychi',[$tungay,$denngay])->paginate(4);
        $totall= Chiketoan::where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
           elseif($tungay&&$denngay&&$idcongtrinh&&$hinhthuc==null) { 
       $chiketoan =Chiketoan::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychi',[$tungay,$denngay])->paginate(4);
      
        $totall= Chiketoan::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
          elseif($idcongtrinh&&$tungay==null&&$denngay==null&&$hinhthuc==null) {  //dd($hinhthuc);
       $chiketoan =Chiketoan::where('idcongtrinh',$idcongtrinh)->paginate(4);
       $totall= Chiketoan::where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
     elseif($tungay&&$denngay&&$hinhthuc==null&&$idcongtrinh==null) {  //dd($hinhthuc);
       $chiketoan =Chiketoan::whereBetween('ngaychi',[$tungay,$denngay])->paginate(5);
       $totall= Chiketoan::whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
           }
           elseif($tungay==null&&$denngay==null&&$hinhthuc&&$idcongtrinh) {  //dd($hinhthuc);
       $chiketoan =Chiketoan::where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->paginate(5);
       $totall= Chiketoan::where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->sum('tien');
           }
            elseif($hinhthuc&&$tungay==null&&$denngay==null&&$idcongtrinh==null) {  //dd($hinhthuc);
       $chiketoan =Chiketoan::where('hinhthuc',$hinhthuc)->paginate(5);
       $totall= Chiketoan::where('hinhthuc',$hinhthuc)->sum('tien');
           }
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/tonghopchiketoan/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/tonghopchiketoan/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.tonghopchiketoan.timkiem',compact('chiketoan','totall','congtrinh','tencongtrinh','tungay','denngay','hinhthuc'));
    }
    ////////////////////////////////

 public function getDanhSachThuketoan(){
      //dd('halo');
      
       $congtrinh=Congtrinh::all();
       
    	$thuketoan= Thuketoan::orderBy('ngaythu','DESC')->paginate(4);
     $tongthu = Thuketoan::sum('tien');
      $tongchi = Chiketoan::sum('tien');
     $tongcon= $tongthu - $tongchi ;
     //dd($tong);
   return view('admin.tonghopthuketoan.danhsach',compact('thuketoan','congtrinh','tongthu','tongchi','tongcon'));
    }

     public function getTimkiemThuketoan(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
        //$id=$request->id;
        $idcongtrinh=$request->idcongtrinh;

        if($idcongtrinh){
        $congtrinh=Congtrinh::find($idcongtrinh);
        $tencongtrinh=$congtrinh->ten; 

         }
         else{$tencongtrinh='';}
          $congtrinh=Congtrinh::all();
        
         if($tungay&&$denngay&&$idcongtrinh) { 
       $thuketoan =Thuketoan::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaythu',[$tungay,$denngay])->paginate(5);
        $totall= Thuketoan::where('idcongtrinh',$idcongtrinh)->whereBetween('ngaythu',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
           elseif($tungay&&$denngay&&$idcongtrinh==null) { 
       $thuketoan =Thuketoan::whereBetween('ngaythu',[$tungay,$denngay])->paginate(5);
        $totall= Thuketoan::whereBetween('ngaythu',[$tungay,$denngay])->sum('tien');
         //dd($totall);
           }
          elseif($idcongtrinh&&$tungay==null&&$denngay==null) {  //dd($hinhthuc);
       $thuketoan =Thuketoan::where('idcongtrinh',$idcongtrinh)->paginate(5);
       $totall= Thuketoan::where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            
    
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/tonghopthuketoan/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/tonghopthuketoan/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.tonghopthuketoan.timkiem',compact('thuketoan','totall','congtrinh','tencongtrinh','tungay','denngay'));
    }
   
 


   
}
