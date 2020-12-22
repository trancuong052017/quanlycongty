<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
     public function getpermissionThem(){
     //dd('halo');
        return view('admin.permission.them');
    }

    public function postpermissionThem(Request $request){
     //dd('halo');
       // dd($request->all());
        $id=DB::table('permissions')->insertGetId([
            'name'=>$request->module_parent ,
            'diplay_name'=>$request->module_parent,//lay ten cua modul vi du tin tuc  tu reqest 
            'parent_id'=>0]);
        foreach($request->module_child as $value){ //lay quyen vi du them sua xoa 
            DB::table('permissions')->insert([
            'name'=>$value ,
            'diplay_name'=>$value,
            'parent_id'=>$id,
             'key_code'=>$request->module_parent.'.'.$value //key_code la ten dua vao router cho phep tuycap
          ]);
          }
        return view('admin.permission.them')->with('thongbao','them thanh cong');
    }
}
