<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Log;
use App\chuc_vu ;
use App\User ;
use Illuminate\Http\Request;
use DB;  
class Chucvucontroller extends Controller
{   //////////////////////////////////////////
    public function getThem(){
        $user = User::all(); 
       
    	return view('admin.chucvu.them',compact('user'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->all());
     	$this->validate($request ,
     		['ten'=>'required',
     		  'hien_thi'=>'required',
     		],
     		['Ten.required'=>'ban chua nhap ten chức vụ ',
     		//'Ten.unique'=>'ten khong duoc trung ',
     		  'hien_thi.required'=>'ban chua nhap ten hien thi',
     		]);
     	//dd($request->all());
     	try{
        DB::beginTransaction();
        $chucvu_id =\DB::table('chuc_vus')->insertGetId([
        'ten' => $request->ten,
        'hien_thi' => $request->hien_thi,
        'created_at'=>date('Y-m-d H:i:s')
           
        ]);
        
         
        $user_ids =$request->user_ids;
         $chucvu = chuc_vu::find($chucvu_id);
        // dd($chucvu);
        $chucvu->user()->attach($user_ids);//dua vao user_chucvu 
         DB::commit();
          return redirect('admin/chucvu/danhsach')->with('thongbao','them thanh cong');
        }catch(\Exception $exception){
          DB::rollback();
        Log::error( 'message:'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
     public function getDanhSach(){
    	$chucvu = chuc_vu::all();
   return view('admin.chucvu.danhsach',['chucvu'=>$chucvu]);
    }
////////////////////////////////////////
     public function getSua($id){
     	$chucvu = chuc_vu::find($id);
        $user = User::all();
        //dd($user);
        $userChecked = $chucvu->user;
        //dd($userChecked);
    	return view('admin.chucvu.sua',compact('user','chucvu','userChecked'));
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
        //dd('halo');
     	$chucvu = chuc_vu::find($id);
     	//dd($request->hien_thi);
       
     	$this->validate($request ,
     		['ten'=>'required',
     		'hien_thi'=>'required'
     		], //unique : loaitin ,Ten kiem tra co trung Ten voi loaitin trong database  khong
     		['ten.required'=>'ban chua nhap ten chuc vu',
     		'hien_thi.required'=>'ban chua nhap ten hien thi'
     		
            ]); 
            
            $chucvu = chuc_vu::find($id);
            $chucvu->ten = $request->ten;
            $chucvu->hien_thi =$request->hien_thi ;
            $chucvu->save();
            //dd($request->user_ids);
           $chucvu->user()->sync($request->user_ids);
    	   return redirect('admin/chucvu/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    
    	//////////////////////
    	 public function getXoa($id){
    	 	$chucvu = chuc_vu::find($id);
    	 	$chucvu->delete();
             DB::table('chuc_vu_user')->where('chuc_vu_id',$id)->delete();
    	return redirect('admin/chucvu/danhsach')->with('thongbao','xoa thanh cong');
    }

}
