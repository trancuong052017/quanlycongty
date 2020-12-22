<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User ;
use App\Congtrinh;
use App\Thu_congtrinh;
use DB; 
use File; 
use App\Chiketoan;
use App\Thuketoan;
use Illuminate\Support\Facades\Auth;
class ChiketoanController extends Controller
{ 
 public function getThem(){
     $congtrinh=Congtrinh::all() ; 
  return view('admin.chiketoan.them',compact('congtrinh'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
       
     	$this->validate($request ,
     		[ 
         'tien'=>'required',
          'iduser'=>'required',
          'hinhthuc'=>'required',
         'anh'=>'required',
         'idcongtrinh'=>'required',
         'ngaychi'=>'required',
         //'nguoinhan'=>'required',
         ],
     	['tien.required'=>'bạn chưa nhập số  tiền',
        'anh.required'=>'chưa nhập chứng từ',
        'idcongtrinh.required'=>'chưa có tên công trình nhận',
        'iduser.required'=>'chưa có tên người nhận ',
        'ngaychi.required'=>'chưa chọn ngày tháng ',
        //'nguoinhan.required'=>'chưa nhập người nhận',
        'hinhthuc.required'=>'chưa chọn chi tiền mặt cho chỉ huy hay mua vật liệu'
        
     	]);

     	 $request->tien =str_replace(',','', $request->tien);
         //dd($request->tien);
        if($request->tien<=0){  return redirect('admin/chiketoan/them')->with('loi','chưa nhập số tiền,hoặc tiền không đúng đinh dạng ');}
       //dd($request->hasFile('anh1'));
         if($request->hasFile('anh')){
          $file =$request->file('anh');
          
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/chiketoan/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/chiketoan/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/chiketoan",$Hinh);
                $request->anh =$Hinh;

              }
             
     //	try{
         //dd($chicongtrinh)
     	$chiketoan =new Chiketoan ;	
      $chiketoan->hinhthuc=$request->hinhthuc;
     	$chiketoan->iduser=$request->iduser;
     	$chiketoan->idcongtrinh=$request->idcongtrinh;
     	$chiketoan->tien=$request->tien;
     	$chiketoan->ngaychi=$request->ngaychi;
     	$chiketoan->anh=$request->anh;
      $nguoinhan =User::find($request->iduser)->name;
     	$chiketoan->nguoinhan=$nguoinhan;
     	$chiketoan->idnguoichi=Auth::user()->id;
         $chiketoan->save();
       if($request->hinhthuc=='tiền_mặt')
       {
         $thucongtrinh =new Thu_congtrinh;
       
        $thucongtrinh->iduser_login=$request->iduser;
     	$thucongtrinh->idcongtrinh=$request->idcongtrinh;
     	$thucongtrinh->tien=$request->tien;
      //dd($request->hinhthuc);
       $thucongtrinh->hinhthuc=$request->hinhthuc;
     	$thucongtrinh->ngaythu=$request->ngaychi;
     	$thucongtrinh->nguoinhan=$nguoinhan;
     	$thucongtrinh->anh=$request->anh;
     	$thucongtrinh->nguoichi=Auth::user()->name;
     	$thucongtrinh->save();
        }
         //DB::commit();
          return redirect('admin/chiketoan/them')->with('thongbao','them thanh cong');
        /*}catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/chiketoan/them')->with('loi','có lỗi xảy ra '); 
        }*/
    }
        //////////////////////////////////////////
    
    public function getDanhSach(){
    	$idnguoichi=Auth::user()->id;
     $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->orderByDesc('ngaychi')->paginate(4);
     $tongchi  = Chiketoan::sum('tien');
      $tongthu  = Thuketoan::sum('tien');
     
      $tongcon =$tongthu - $tongchi ;
     $congtrinh=Congtrinh::all();
   return view('admin.chiketoan.danhsach',compact('chiketoan','congtrinh','tongchi','tongcon','tongthu'));
    }
    ///////////////////////////////////
    public function getTimkiem(Request $request){
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        //dd($denngay);
       // $id=$request->id;
        $idcongtrinh=$request->idcongtrinh;
        if($idcongtrinh){
        $tencongtrinh=Congtrinh::find($idcongtrinh)->ten;
         }
         else{$tencongtrinh='';}
        $hinhthuc=$request->hinhthuc;
       if($hinhthuc){$hinhthuc=$hinhthuc ;}
        else{$hinhthuc='';}
        $idnguoichi=Auth::user()->id;
        //dd($hinhthuc);
        //dd($denngay);
      $congtrinh=Congtrinh::all();
     if($tungay&&$denngay&&$idcongtrinh==null&&$hinhthuc==null){ //dd('tungay den ngay');
     $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi', [$tungay,$denngay])->orderByDesc('ngaychi')->paginate(5);
      $totall= Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
      
      }
   
     /* elseif($id) { 
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->where('id',$id)->paginate(5);
       $totall =Chiketoan::where('idnguoichi',$idnguoichi)->where('id',$id)->sum('tien');
           }*/
           elseif($hinhthuc&&$tungay==null&&$denngay==null&&$idcongtrinh==null) { 
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->where('hinhthuc',$hinhthuc)->paginate(5);
       $totall =Chiketoan::where('idnguoichi',$idnguoichi)->where('hinhthuc',$hinhthuc)->sum('tien');
           }
         elseif($tungay&&$denngay&&$idcongtrinh&&$hinhthuc==null) { 
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->paginate(5);
        $totall= Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->sum('tien');
         //dd($totall);
           }
            elseif($tungay&&$denngay&&$idcongtrinh&&$hinhthuc) { // dd('denngay');
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->paginate(5);
       $totall= Chiketoan::where('idnguoichi',$idnguoichi)->whereBetween('ngaychi',[$tungay,$denngay])->where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->sum('tien');
           }
          elseif($idcongtrinh&&$hinhthuc==null&&$tungay==null&&$denngay==null&&$hinhthuc==null ) {  //dd($hinhthuc);
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->paginate(5);
       $totall= Chiketoan::where('idnguoichi',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->sum('tien');
           }
            elseif($idcongtrinh&&$hinhthuc&&$tungay==null&&$denngay==null) { //dd('id va hinh thuc');
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->paginate(5);
       $totall= Chiketoan::where('idnguoichi',$idnguoichi)->where('idcongtrinh',$idcongtrinh)->where('hinhthuc',$hinhthuc)->sum('tien');
           }
    elseif($tungay&&$denngay&&$hinhthuc&&$idcongtrinh==null) { 
      
       $chiketoan =Chiketoan::where('idnguoichi',$idnguoichi)->where('hinhthuc',$hinhthuc)->whereBetween('ngaychi',[$tungay,$denngay])->paginate(5);
        $totall= Chiketoan::where('idnguoichi',$idnguoichi)->where('hinhthuc',$hinhthuc)->whereBetween('ngaychi',[$tungay,$denngay])->sum('tien');
           }
        else{ if($tungay&&$denngay==null||$denngay&&$tungay==null){
        return redirect('admin/chiketoan/danhsach')->
       with('loi','phải chọn từ ngày -đến ngày chính xác');}
          else{return redirect('admin/chiketoan/danhsach')->
       with('loi','phải chọn mục tìm kiếm');}
       }
       
    return view('admin.chiketoan.timkiem',compact('chiketoan','totall','congtrinh','tencongtrinh','tungay','denngay','hinhthuc'));
    }
   
    	//////////////////////
    	 public function getXoa($id){
    	 	$chiketoan = Chiketoan::find($id);
      
        //xoa cac anh cua san pham
        try{
        $image_link1 = 'public/upload/chiketoan/'.$chiketoan->anh;
        //dd(strlen('public/upload/chicongtrinh'));
        
        if(File::exists($image_link1))
        {
            File::delete(($image_link1));
        }
        $chiketoan->delete();
        $thucongtrinh=Thu_congtrinh::where('anh',$chiketoan->anh)->where('tien',$chiketoan->tien)->where('iduser_login',$chiketoan->iduser)->first();
        if($thucongtrinh){
        $thucongtrinh->delete();
         }
         DB::commit();
        return redirect('admin/chiketoan/danhsach')->with('thongbao','xoa thanh cong');
         }
         catch(\Exception $exception){
          DB::rollback();
           return redirect('admin/chiketoan/danhsach')->with('loi','có lỗi xảy ra '); 

         }
       }
}
   
