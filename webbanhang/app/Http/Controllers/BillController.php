<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bill_detail;
use App\bills ;
use DB;
class BillController extends Controller
{
   public function getXem($id){
       
   $danhsach_hang= bill_detail::where('id_bill',$id)->get();
    $donhang =bills::find($id);
    return view('admin.donhang.xem',compact('danhsach_hang','donhang'));  
       
	 } 

	 public function getXuathang($id){
       
     $bills=bills::all();
    $donhang =bills::find($id);
    $donhang->status=1;
    $donhang->save();
    return view('admin.trangchu',compact('bills'));  
       
	 } 
	 public function getXoa($id){

	 	try{
	 		DB::beginTransaction();
		$bill_detail=bill_detail::where('id_bill',$id);

		$bill_detail->delete() ;
		$bill =bills::find($id);
		$bill->delete() ;
		 DB::commit();
		return redirect('admin/trangchu')->with('thongbao','xóa thành công ');
		 }
		 catch(\Exception $exception){
          DB::rollback();
        return redirect('admin/trangchu')->with('loi','xóa không thành công ');
        }	  
}
}
