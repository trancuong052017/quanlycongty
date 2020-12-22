<?php

namespace App\Http\Controllers;
use App\type_products;

use Illuminate\Http\Request;

class type_productController extends Controller
{
     public function getDanhSach(){
    	$type_product = type_products::all();
   return view('admin.type_product.danhsach',['type_product'=>$type_product]);
    }
////////////////////////////////////////
     public function getSua($id){
     	$type_product = type_products::find($id);
        
    	return view('admin.type_product.sua',['type_product'=>$type_product]);
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
     	$type_product = type_products::find($id);
     	//dd($request->Ten);
        if($type_product){
     	$this->validate($request ,
     		['name'=>'required|unique:type_products,name|min:4|max:50'
     		], //unique : type_product ,Ten kiem tra co trung Ten voi type_product trong database  khong
     		['name.required'=>'ban chua nhap ten the loai',
     		'name.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'name.unique'=>'ten da ton tai',

     		'name.max'=>'ten phai co do dai it nhat 50 ky tu',
     		]); }
     //	$type_product = new type_product ;
     	$type_product->name = $request->name ;
        
     	$type_product->TenKhongDau =changeTitle($request->name);
     	$type_product->save();
     	//dd($type_product);
    	return redirect('admin/type_product/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    //////////////////////////////////////////
     public function getThem(){
       
    	return view('admin.type_product.them');
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->Ten);
     	$this->validate($request ,
     		['name'=>'required|min:4|max:50|unique:type_products'
     		],
     		['name.required'=>'ban chua nhap ten the loai',
     		'name.min'=>'ten phai co do dai it nhat 4 ky tu',
     		'name.max'=>'ten phai co do dai it nhat 50 ky tu',
            'name.unique'=>'ten da ton tai',
     		]);
     	$type_product = new type_products ;
     	$type_product->name = $request->name;
     	//dd($type_product->Ten);
       // $type_product->idTheLoai =$request->idTheLoai;
     	/*$type_product->TenKhongDau =changeTitle($request->name);*/
        //dd($type_product);
     	$type_product->save();
     	//dd($type_product);
    	return redirect('admin/type_product/them')->with('thongbao','them thanh cong');
    }
    	//////////////////////
    	 public function getXoa($id){
    	 	$type_product = type_products::find($id);
            if(count($type_product->tintuc)>0){
             return redirect('admin/type_product/danhsach')->with('loi','xoa không thanh cong đang còn tin tức trong mục này');   
            }
    	 	$type_product->delete();
    	return redirect('admin/type_product/danhsach')->with('thongbao','xóa thành công');
    }
    
}
