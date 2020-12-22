<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
//use App\Http\Requests;

class SlideController extends Controller
{  public  function getDanhSach()
  { //dd('halo');
    $slide =Slide::all();
   // dd($slide);
    return view('admin.slide.danhsach',['slide'=>$slide]);
  }
   /////////////////////////////////////////////////////////  

 public  function getThem()
  { //dd('halo');
    
    return view('admin.slide.them');
  }
  ///////////////////////////////////////////////////////////
  public  function postThem(Request $request)
  { //dd('halo');
    $this->validate($request ,
     		[
              'Ten'=>'required',
              'NoiDung'=>'required',
              
              'Hinh'    =>'required'
     		],
     		[
     		'Ten.required'=>'ban chua nhap ten ',
     		
            'NoiDung.required'=>'ban chua nhap ten noi dung',
           'Hinh.required' =>'ban chua nhap hinh'
     		]);
     	$slide = new Slide ;
       
        $slide->Ten = $request->Ten ;
        $slide->Link = $request->Link ;
        $slide->NoiDung = $request->NoiDung ;
        
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/slide/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("upload/slide/".$Hinh)){
                $Hinh =random_str(4,20).'_'.$name;
                }
                $file->move("upload/slide",$Hinh);
                /* $image_link = 'upload/slide/'.$slide->Hinh;
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }*/
               
                $slide->Hinh =$Hinh;
                $slide->Hinh =$Hinh;

            }
        
       
     	$slide->save();
     	
    	return redirect('admin/slide/them')->with('thongbao','them thanh cong');
    
  }
///////////////////////////////////////////
  public  function getSua($id)
  { //dd('halo');
    $slide = Slide::find($id);
        
    	return view('admin.slide.sua',['slide'=>$slide]);
   
  }
  ///////////////////////////////////////////////
  public  function postSua(Request $request ,$id)
  { //dd('halo');
   $slide= Slide::find($id);
    $this->validate($request ,
     		[
              'Ten'=>'required',
              'NoiDung'=>'required',
              
             
     		],
     		[
     		'Ten.required'=>'ban chua nhap ten ',
     		
            'NoiDung.required'=>'ban chua nhap ten noi dung',
          
     		]);
     
       
        $slide->Ten = $request->Ten ;
        $slide->link = $request->Link ;
        $slide->NoiDung = $request->NoiDung ;
        
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'&& $duoi !='JPG'){
           return redirect('admin/slide/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("upload/slide/".$Hinh)){
                $Hinh =random_str(4,20).'_'.$name;
                }
                $file->move("upload/slide",$Hinh);
                 $image_link = 'upload/slide/'.$slide->Hinh;
                 //dd($image_link);
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }
               
                $slide->Hinh =$Hinh;

            }
        
       
     	$slide->save();
     	//dd($tintuc);
    	return redirect('admin/slide/sua/'.$slide->id)->with('thongbao','sua thanh cong');;
    }

    	//////////////////////
    	 public function getXoa($id){
            //dd($id);
    	 	$slide = Slide::find($id);
        $hinh =$slide->Hinh ;
        //xoa cac anh cua san pham
        $image_link = 'upload/slide/'.$slide->Hinh;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
       
    	 	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao','xoa thanh cong');
    }
}
