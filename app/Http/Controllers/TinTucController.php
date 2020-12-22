<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use Illuminate\Http\Request;
use File;
class tintucController extends Controller
{
    public function getDanhSach(){
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
       // dd($tintuc);
   return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    
////////////////////////////////////////
     public function getSua($id){
     	$tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        //$loaitin =LoaiTin::all();
        $idtheloai =$tintuc->loaitin->theloai->id ;
        //dd($idtheloai);
        $loaitin =LoaiTin::where('idTheLoai','=',$idtheloai)->get();
        
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin ,'theloai'=>$theloai]);
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id)
    {
     	//dd($request->Ten);
        $tintuc=TinTuc::find($id);
        $this->validate($request ,
            ['idLoaiTin'=>'required',
              'TieuDe'=>'required',
              'TomTat'=>'required',
              'NoiDung'=>'required'
             
            ],
            ['idLoaiTin.required'=>'ban chua nhap ten loai tin',
            'TieuDe.required'=>'ban chua nhap ten tieu de',
            'TomTat.required'=>'ban chua nhap ten tom tat',
            'NoiDung.required'=>'ban chua nhap ten noi dung'
            
            ]);
        
        $tintuc->idLoaiTin = $request->idLoaiTin ;
        $tintuc->TieuDe = $request->TieuDe ;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung ;
        $tintuc->SoLuotXem=0 ;
        if($request->hasFile('Hinh'))
        {
           $file=$request->file('Hinh');
              $this->uploadHinh($file ,$tintuc);
             /* $image_link = 'upload/tintuc/'.$tintuc->Hinh ;
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }
               
                $tintuc->Hinh =$Hinh;*/
        }
       // dd($tintuc);
        $tintuc->TieuDeKhongDau =changeTitle($request->TieuDe);
        $tintuc->save();
        //dd($tintuc);
        return redirect('admin/tintuc/danhsach')->with('thongbao','sua thanh cong');
    }
    
    
    //////////////////////////////////////////
     public function getThem(){
        $theloai = TheLoai::all();
        // $loaitin =LoaiTin::all();
         //dd($loaitin);
    	return view('admin.tintuc.them',['theloai'=>$theloai]);
          }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->Ten);
     	$this->validate($request ,
     		['idLoaiTin'=>'required',
              'TieuDe'=>'required',
              'TomTat'=>'required',
              'NoiDung'=>'required',
              'Hinh'    =>'required'
     		],
     		['idLoaiTin.required'=>'ban chua nhap ten loai tin',
     		'TieuDe.required'=>'ban chua nhap ten tieu de',
     		'TomTat.required'=>'ban chua nhap ten tom tat',
            'NoiDung.required'=>'ban chua nhap ten noi dung',
            'Hinh.required' =>'ban chua nhap hinh'
     		]);
     	$tintuc = new TinTuc ;
        $tintuc->idLoaiTin = $request->idLoaiTin ;
        $tintuc->TieuDe = $request->TieuDe ;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung ;
        $tintuc->SoLuotXem=0 ;
          $tintuc->NoiBat=$request->NoiBat ;
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
           
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/tintuc/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/upload/tintuc/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/upload/tintuc",$Hinh);
                $tintuc->Hinh =$Hinh;

            }
        
        $tintuc->TieuDeKhongDau =changeTitle($request->TieuDe);
     	$tintuc->save();
     	//dd($tintuc);
    	return redirect('admin/tintuc/them')->with('thongbao','them thanh cong');
    }
    	//////////////////////
    	 public function getXoa($id){
            //dd($id);
    	 	$tintuc = TinTuc::find($id);
          
        $image_link = 'public/upload/tintuc/'.$tintuc->Hinh;
       
       //xoa cac anh cua san pham
        $image_link = 'public/upload/tintuc/'.$tintuc->Hinh;
      
        if(File::exists($image_link))
        {
            File::delete(($image_link));
        }
        
    	 	$tintuc->delete();
    	return redirect('admin/tintuc/danhsach')->with('thongbao','xoa thanh cong');
    }
    public function xoaComment($id,$idTinTuc){
            //dd($id);
        $comment = Comment::find($id);
        $comment->delete();
      return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','xoa thanh cong');
    }
    ////////////////////////////////////////////
     public function uploadHinh($file,$tintuc)
     {
        $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi!='jfif'&& $duoi !='mp4'&& $duoi !='JPG')
        {
           return redirect('admin/tintuc/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
         while(file_exists("public/upload/tintuc/".$Hinh))//tim file anh trong upload khong cho trung
            {
                $Hinh =random_int(4,20).'_'.$name;
            }
                $file->move("public/upload/tintuc",$Hinh);
               //$image_link = 'upload/tintuc/'.$tintuc->Hinh ;
                if(file_exists('public/upload/tintuc/'.$tintuc->Hinh))
                {  // $image_link = 'upload/tintuc/'.$tintuc->Hinh ;
                    unlink('public/upload/tintuc/'.$tintuc->Hinh);
                }
               
                $tintuc->Hinh =$Hinh;   
               
     }
}
