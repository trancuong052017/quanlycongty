<?php

namespace App\Http\Controllers;
use App\Duan;
use App\TheLoai;
use File;
use Illuminate\Http\Request;

class DuanController extends Controller
{
   public function getDanhSach(){
    $duan = Duan::orderBy('id','DESC')->get();
       //dd($duan);
   return view('admin.duan.danhsach',['duan'=>$duan]);
    }
    
////////////////////////////////////////
     public function getSua($id){
     	$duan = Duan::find($id);
        $theloai = TheLoai::all();
        //$loaitin =LoaiTin::all();
       /* $idtheloai =$duan->theloai->id ;
        //dd($idtheloai);
        $loaitin =LoaiTin::where('idTheLoai','=',$idtheloai)->get();*/
        
    	return view('admin.duan.sua',['duan'=>$duan,'theloai'=>$theloai]);
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id)
    {
     	//dd($request->Ten);
        $duan=Duan::find($id);
        $this->validate($request ,
            ['id_theloai'=>'required',
              'ten'=>'required',
              'doitac'=>'required',
              'vitri'=>'required'
             
            ],
            ['id_theloai.required'=>'ban chua nhap ten du an',
            'doitac.required'=>'ban chua nhap ten đối tác ',
            'vitri.required'=>'ban chua nhap ten địa chỉ dự án  ',
            
            
            ]);
        
        $duan->id_theloai = $request->id_theloai  ;
        $duan->ten  = $request->ten  ;
        $duan->doitac  = $request->doitac ;
        $duan->vitri  = $request->vitri; 
        if($request->ngaythicong){
        	$duan->ngaythicong=$request->ngaythicong;
        }
         if($request->ngayhoanthanh){
        	$duan->ngayhoanthanh=$request->ngayhoanthanh;
        }
         
        if($request->hasFile('anh'))
        {
           $file=$request->file('anh');
           $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi!='jfif'&& $duoi !='mp4'&&$duoi !='JPG')
        {
           return redirect('admin/duan/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            

            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
         while(file_exists('public/upload/duan/'.$Hinh))//tim file anh trong upload khong cho trung
            {
                $Hinh =random_int(4,20).'_'.$name;
            }
                $file->move('public/upload/duan',$Hinh);
               $image_link = 'upload/duan/'.$duan->anh ;
                if(File::exists($image_link))
                {  // $image_link = 'upload/duan/'.$duan->Hinh ;
                    File::delete($image_link);
                }
               
                $duan->anh  =$Hinh;
             
        }
         if($request->hasFile('anhkemtheo')){
        	
            $files=$request->file('anhkemtheo');
            //dd($files);
            $n=0;
             $image_list=array();
         foreach($files as $file ){
         	
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !="JPG")
        {
           return redirect('admin/duan/sua/'.$id)->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/duan".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
                $file->move("public/upload/duan",$Hinh);
                
                $image_list[$n]=$Hinh;
                
           $n=$n+1;
            }
           $duan->anhkemtheo=json_encode($image_list);
          }
         // dd( $duan->anhkemtheo);
        $duan->noibat=$request->noibat;
        $duan->khongdau  =changeTitle($request->ten);
        $duan->save();
        //dd($duan);
        return redirect('admin/duan/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    
    //////////////////////////////////////////
     public function getThem(){
        $theloai = TheLoai::all();
        // $loaitin =LoaiTin::all();
         //dd($theloai);
    	return view('admin.duan.them',['theloai'=>$theloai]);
          }
    /////////////////////////////////////
     public function postThem(Request $request){
     //dd($request->Ten);
        $duan=new Duan;
        $this->validate($request ,
            ['id_theloai'=>'required',
              'ten'=>'required',
              'doitac'=>'required',
              'vitri'=>'required',
              'anh'=>'required',
             
            ],
            ['id_theloai.required'=>'ban chua nhap ten du an',
            'doitac.required'=>'ban chua nhap ten đối tác ',
            'vitri.required'=>'ban chua nhap ten địa chỉ dự án  ',
            'anh.required'=>'ban chua nhap anh du an'
            
            ]);
        
        $duan->id_theloai = $request->id_theloai  ;
        $duan->ten  = $request->ten  ;
        $duan->ngaytao=now();
        if($request->ngaythicong){$duan->ngaythicong
        	=$request->ngaythicong;}
        if($request->ngayhoanthanh){$duan->ngayhoanthanh
        	=$request->ngayhoanthanh;}
        $duan->noibat=$request->noibat;		
        $duan->doitac  = $request->doitac ;
        $duan->vitri  = $request->vitri;

        $duan->luotxem =0; 
        if($request->hasFile('anh'))
        {
           $file=$request->file('anh');
           //dd($file);
          $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi!='jfif'&& $duoi !='mp4'&&$duoi !='JPG')
        {
           return redirect('admin/duan/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            

            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
         while(file_exists('public/upload/duan/'.$Hinh))//tim file anh trong upload khong cho trung
            {
                $Hinh =random_int(4,20).'_'.$name;
            }
                $file->move('public/upload/duan',$Hinh);
               /*//$image_link = 'upload/duan/'.$duan->Hinh ;
                if(File::exists($path.$duan->anh))
                {  // $image_link = 'upload/duan/'.$duan->Hinh ;
                    File::delete($path.$duan->anh);
                }
               */
                $duan->anh  =$Hinh;
             
        }
         if($request->hasFile('anhkemtheo')){
        	
            $files=$request->file('anhkemtheo');
           // dd($files);
            $n=0;
             $image_list=array();
         foreach($files as $file ){
         	
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi != 'JPG')
        {
           return redirect('admin/duan/them')->with('loi','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/duan".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
                $file->move("public/upload/duan",$Hinh);
                
                $image_list[$n]=$Hinh;
                
           $n=$n+1;
            }
           $duan->anhkemtheo=json_encode($image_list);
          }
        
       
       
        $duan->khongdau  =changeTitle($request->ten);
        $duan->save();
        //dd($duan);
        return redirect('admin/duan/danhsach')->with('thongbao','them thanh cong');	
    }
    	//////////////////////
    	 public function getXoa($id){
            //dd($id);
    	 	$duan = Duan::find($id);
          
        $image_link = 'public/upload/duan/'.$duan->anh;
       
       //xoa cac anh cua san pham
        
      
        if(File::exists($image_link))
        {
            File::delete(($image_link));
        }
        if($duan->anhkemtheo){
           $anhkemtheo=json_decode($duan->anhkemtheo);
           //dd($anhkemtheo);
           foreach($anhkemtheo as  $value){
             $image_link = 'public/upload/duan/'.$value;
             if(File::exists($image_link))
            {
            File::delete(($image_link));
            } 
           }
          }

    	 	$duan->delete();
    	return redirect('admin/duan/danhsach')->with('thongbao','xoa thanh cong');
    }
    public function xoaComment($id,$idduan){
            //dd($id);
        $comment = Comment::find($id);
        $comment->delete();
      return redirect('admin/duan/sua/'.$idduan)->with('thongbao','xoa thanh cong');
    }
    ////////////////////////////////////////////
     public function uploadHinh($file,$duan,$path)
     {
        $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi!='jfif'&& $duoi !='mp4'&& $duoi !='JPG')
        {
           return redirect('admin/duan/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            

            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
         while(file_exists($path.$Hinh))//tim file anh trong upload khong cho trung
            {
                $Hinh =random_int(4,20).'_'.$name;
            }
                $file->move($path,$Hinh);
               /*//$image_link = 'upload/duan/'.$duan->Hinh ;
                if(File::exists($path.$duan->anh))
                {  // $image_link = 'upload/duan/'.$duan->Hinh ;
                    File::delete($path.$duan->anh);
                }
               */
                $duan->anh  =$Hinh;   
               
     }
}
