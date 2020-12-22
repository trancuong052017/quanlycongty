<?php

namespace App\Http\Controllers;
use App\role;
use App\permission;
use App\permision_role;
use Illuminate\Http\Request;
use DB;
class RoleController extends Controller
{
    public function getDanhSach(){
    	$role = role::all();
   return view('admin.role.danhsach',['role'=>$role]);
    }
////////////////////////////////////////
     public function getSua($id){
     	$role = role::find($id);
        $permission = permission::where('parent_id',0)->get();
        //dd($quyen_cha);
        $permissionChecked = $role->permission;
        //dd($permissionChecked);
    	return view('admin.role.sua',compact('role','permission','permissionChecked'));
    }
    /////////////////////////////////////////////////////
     public function postSua(Request $request ,$id){
        //dd('halo');
     	$role = role::find($id);
     	//dd($request->Ten);
        if($role->name != $request->name){
     	$this->validate($request ,
     		['name'=>'required',
     		'diplay_name'=>'required'
     		], //unique : loaitin ,Ten kiem tra co trung Ten voi loaitin trong database  khong
     		['name.required'=>'ban chua nhap ten vai tro',
     		'diplay_name.required'=>'ban chua nhap mo ta vai tro'
     		
            ]); }
            $role =role::find($id);
            
            $role->name = $request->name ;
            $role->diplay_name =$request->diplay_name ;
            $role->save();
            //dd($request->permission_id);
           $role->permission()->sync($request->permission_id);
    	   return redirect('admin/role/sua/'.$id)->with('thongbao','sua thanh cong');
    }
    
    //////////////////////////////////////////
    public function getThem(){
    $quyen_cha =permission::where('parent_id',0)->get();
        //dd($quyen_cha);
    	return view('admin.role.them',compact('quyen_cha'));
    }
    /////////////////////////////////////
     public function postThem(Request $request){
     	//dd($request->Ten);
     	$this->validate($request ,
     		['name'=>'required',
     		  'diplay_name'=>'required' 
     		],
     		['Ten.required'=>'ban chua nhap ten vai tro',
     		'diplay_name.required'=>'dien mo ta vai tro'
     		
     		]);
     	/*$role = new role;
     	$role->name = $request->name ;
     	//dd($loaitin->Ten);
        $role->diplay_name =$request->diplay_name;
     	
     	$role=$role->save();*/
     	
        $role_id=DB::table('roles')->insertGetId(
            ['name'=>$request->name ,
              'diplay_name'=>$request->diplay_name
            ]);
        $role=role::find($role_id);
         $role->permission()->attach($request->permission_id);
    	return redirect('admin/role/danhsach')->with('thongbao','them thanh cong');
    }
    	//////////////////////
    	 public function getXoa($id){
    	 	$role = role::find($id);
    	 	$role->delete();
             DB::table('permision_roles')->where('role_id',$id)->delete();
    	return redirect('admin/role/danhsach')->with('thongbao','xoa thanh cong');
    }

   
    
}
