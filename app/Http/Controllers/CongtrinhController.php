<?php

namespace App\Http\Controllers;


use App\Congtrinh ;
use App\User ;
use Illuminate\Http\Request;
use DB; 
use File; 
class CongtrinhController extends Controller
{   //////////////////////////////////////////
    public function getThem(){
        $user = User::all(); 
       //dd($user) ;
    	return view('admin.congtrinh.them',compact('user'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->all());
     	$this->validate($request ,
     		['ten'=>'required',
          'idchihuy'=>'required',
          'diachi'=>'required',
          'vondautu'=>'required',
     		  
     		],
     		['ten.required'=>'ban chua nhap ten cong trình  ',
     		  'idchihuy.required'=>'ban chua nhap nguoi chi huy',
          'diachi'.'required'=>'ban chua nhap dia chi ',
     		  'vondautu'.'required'=>'ban chua nhap tong von dau tu',
     		]);
         if($request->hasFile('anh')){
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/congtrinh/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/congtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/congtrinh",$Hinh);
                $request->anh =$Hinh;

              }
              $congtrinh = new Congtrinh ;
            $congtrinh->ten =$request->ten;
       $congtrinh->chihuy =User::find($request->idchihuy)->name;
         $congtrinh->ngaykhoicong =$request->ngaykhoicong;
        $congtrinh->diachi =$request->diachi;
         if($request->ngayhoanthanh){
          $congtrinh->ngayhoanthanh=$request->ngayhoanthanh ;
         }
        $congtrinh->tinhtrang =$request->tinhtrang;
        $congtrinh->noidung =$request->noidung;
        $congtrinh->anh =$request->anh;
         $request->vondautu =str_replace(',','', $request->vondautu);
        $congtrinh->vondautu =$request->vondautu;
        $congtrinh->tienconno  =$request->vondautu;
     	try{
       
         $congtrinh->save();
        $idcongtrinh = $congtrinh->id;

          //dd($idcongtrinh.'halo');

        $idchihuy  =$request->idchihuy;
         $congtrinh = Congtrinh::find($idcongtrinh);
        
        $congtrinh->user()->attach($idchihuy);//dua vao user_chucvu 
         DB::commit();
          return redirect('admin/congtrinh/them')->with('thongbao','thêm thành công');
        }catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/congtrinh/them')->with('loi','đã có lỗi');
        }
    }
        //////////////////////////////////////////
    
     public function getDanhSach(){
    	$congtrinh= Congtrinh::paginate(4);
      $vondautu =Congtrinh::sum('vondautu');
       $tiendathu =Congtrinh::sum('tiendathu');
       $tienconno =$vondautu-$tiendathu ;
   return view('admin.congtrinh.danhsach',compact('congtrinh','tiendathu','vondautu','tienconno'));
    }
////////////////////////////////////////
     public function getSua($id){
     	$congtrinh  = Congtrinh::find($id);
        $user = User::all();
       //dd($congtrinh);
        $userchecked = $congtrinh->user;//lay tat ca user thuoc congtrinh do
        //dd($userchecked);
    	return view('admin.congtrinh.sua',compact('user','congtrinh','userchecked'));
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
       //dd($request->all());
        $congtrinh = Congtrinh::find($id);
          $this->validate($request ,
        ['ten'=>'required',
          'idchihuy'=>'required',
          'diachi'=>'required',
         'vondautu'=>'required',
          
          
        ],
        ['ten.required'=>'ban chua nhap ten cong trình  ',
          'idchihuy.required'=>'ban chua nhap nguoi chi huy',
          'diachi'.'required'=>'ban chua nhap dia chi ',
          'vondautu.required'=>'ban chua nhap tien dau tu cong trình  ',
          
        ]);
         if($request->hasFile('anh')){
          $file =$request->file('anh');
           //dd($file);
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/congtrinh/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/congtrinh/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/congtrinh",$Hinh);
                $request->anh =$Hinh;
               $congtrinh->anh =$request->anh;
               //dd( $congtrinh->anh);
              }
              else{$congtrinh->anh=$congtrinh->anh ;}
             
         $congtrinh->ten =$request->ten;
         $request->vondautu =str_replace(',','', $request->vondautu);
        $congtrinh->vondautu =$request->vondautu;
        $congtrinh->tienconno=$congtrinh->vondautu-$congtrinh->tiendathu ;
          //dd($congtrinh->anh);
        if($request->ngaykhoicong){
         $congtrinh->ngaykhoicong =$request->ngaykhoicong;
        }
        else{$congtrinh->ngaykhoicong =$congtrinh->ngaykhoicong ;}
         if($request->ngayhoanthanh){
         $congtrinh->ngayhoanthanh =$request->ngayhoanthanh;
        }
        else{$congtrinh->ngayhoanthanh =$congtrinh->ngayhoanthanh ;}
        //dd($congtrinh->ngayhoanthanh);
        $congtrinh->diachi = $request->diachi ;
       
        $congtrinh->tinhtrang =$request->tinhtrang;
        if($request->tinhtrang==1){
         $congtrinh->ngayhoanthanh = null; 
        }
        
        //dd($congtrinh->tinhtrang);
        $congtrinh->noidung =$request->noidung;
       
       try{
       // dd($congtrinh);
         $congtrinh->save();
        $idcongtrinh = $congtrinh->id;

          //dd($idcongtrinh.'halo');

        $idchihuy  =$request->idchihuy;
         $congtrinh = Congtrinh::find($idcongtrinh);
        
        $congtrinh->user()->sync($idchihuy);//dua vao congtrinh_user
         DB::commit();
          return redirect('admin/congtrinh/sua/'.$id)->with('thongbao','sua  thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
       return redirect('admin/congtrinh/sua/'.$id)->with('loi','sữa không  thành công');
        }
    }
        //////////////////////////////////////////
    
    /* public function getDanhSach(){
        $congtrinh= Congtrinh::all();
   return view('admin.congtrinh.danhsach',compact('congtrinh'));
    }*/
    
    
    	//////////////////////
    	 public function getXoa($id){
    	 	$congtrinh = Congtrinh::find($id);
        
        //xoa cac anh cua congtrinh
        $image_link = 'public/upload/congtrinh/'.$congtrinh->anh;
        
       
        try{
               if(File::exists($image_link))
               {
           File::delete($image_link);
                }
             $congtrinh->delete();
             DB::table('congtrinh_user')->where('idcongtrinh',$id)->delete();
             DB::commit();
    	return redirect('admin/congtrinh/danhsach')->with('thongbao','xoa thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
   return redirect('admin/congtrinh/danhsach')->with('loi','xoa khong thanh cong');
        }
    }

}
