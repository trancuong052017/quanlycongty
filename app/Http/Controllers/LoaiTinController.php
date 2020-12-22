<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin ;

use Illuminate\Http\Request;

class loaitinController extends Controller
{
    public function getDanhSach(){
    	$loaitin = LoaiTin::all();
   return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
////////////////////////////////////////
     public function getSua($id){
     	$loaitin = LoaiTin::find($id);
         $theloai =TheLoai::all();
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin ,'theloai'=>$theloai]);
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
     	$loaitin = LoaiTin::find($id);
     	//dd($request->Ten);
        if($loaitin->Ten != $request->Ten){
     	$this->validate($request ,
     		['Ten'=>'required|unique:loaitin,Ten|min:4|max:50'
     		], //unique : loaitin ,Ten kiem tra co trung Ten voi loaitin trong database  khong
     		['Ten.required'=>'ban chua nhap ten the loai',
     		'Ten.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'Ten.unique'=>'ten da ton tai',

     		'Ten.max'=>'ten phai co do dai it nhat 50 ky tu',
     		]); }
     //	$loaitin = new loaitin ;
     	$loaitin->Ten = $request->Ten ;
        $loaitin->idTheLoai = $request->id ;
     	//dd($loaitin->Ten);
     	$loaitin->TenKhongDau =changeTitle($request->Ten);
     	$loaitin->save();
     	//dd($loaitin);
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    //////////////////////////////////////////
     public function getThem(){
        $theloai = TheLoai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->Ten);
     	$this->validate($request ,
     		['Ten'=>'required|min:4|max:50|unique:loaitin'
     		],
     		['Ten.required'=>'ban chua nhap ten the loai',
     		'Ten.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'Ten.max'=>'ten phai co do dai it nhat 50 ky tu',
            'Ten.unique'=>'ten da ton tai',
     		]);
     	$loaitin = new LoaiTin ;
     	$loaitin->Ten = $request->Ten ;
     	//dd($loaitin->Ten);
        $loaitin->idTheLoai =$request->idTheLoai;
     	$loaitin->TenKhongDau =changeTitle($request->Ten);
        //dd($loaitin);
     	$loaitin->save();
     	//dd($loaitin);
    	return redirect('admin/loaitin/them')->with('thongbao','them thanh cong');
    }
    	//////////////////////
    	 public function getXoa($id){
    	 	$loaitin = LoaiTin::find($id);
            if(count($loaitin->tintuc)>0){
             return redirect('admin/loaitin/danhsach')->with('loi','xoa không thanh cong đang còn tin tức trong mục này');   
            }
    	 	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao','xóa thành công');
    }
    

}
