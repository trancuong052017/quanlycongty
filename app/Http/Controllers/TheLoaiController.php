<?php

namespace App\Http\Controllers;
use App\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	$theloai = TheLoai::all();
       // $theloai= \DB::table('theloai')->get();
       //dd($theloai);
   return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
////////////////////////////////////////
     public function getSua($id){
     	$theloai = TheLoai::find($id);
      

    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
     	$theloai = TheLoai::find($id);
     	//dd($request->Ten);
     	$this->validate($request ,
     		['Ten'=>'required|unique:TheLoai,Ten|min:4|max:50'
     		], //unique : TheLoai ,Ten kiem tra co trung Ten voi theloai trong database  khong
     		['Ten.required'=>'ban chua nhap ten the loai',
     		'Ten.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'Ten.unique'=>'ten da ton tai',

     		'Ten.max'=>'ten phai co do dai it nhat 50 ky tu',
     		]);
     //	$theloai = new TheLoai ;
     	$theloai->Ten = $request->Ten ;
     	//dd($theloai->Ten);
     	$theloai->TenKhongDau =changeTitle($request->Ten);
     	$theloai->save();
     	//dd($theloai);
    	return redirect('admin/theloai/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    //////////////////////////////////////////
     public function getThem(){
    	return view('admin.theloai.them');
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->Ten);
     	$this->validate($request ,
     		['Ten'=>'required|min:4|max:50'
     		],
     		['Ten.required'=>'ban chua nhap ten the loai',
     		'Ten.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'Ten.max'=>'ten phai co do dai it nhat 50 ky tu',
     		]);
     	$theloai = new TheLoai ;
        //dd($theloai);
     	$theloai->Ten = $request->Ten ;
     	//dd($theloai->Ten);
     	$theloai->TenKhongDau =changeTitle($request->Ten);
        //dd($theloai);
     	$theloai->save();
     	//dd($theloai);
    	return redirect('admin/theloai/them')->with('thongbao','them thanh cong');
    }
    	//////////////////////
    	 public function getXoa($id){
    	 	$theloai = TheLoai::find($id);
            if(count($theloai->loaitin)>0){
            return redirect('admin/theloai/danhsach')->with('loi','xoa không thanh cong ');    
            }
    	 	$theloai->delete();
    	return redirect('admin/theloai/danhsach')->with('thongbao','xoa thanh cong');
    }
    

}
