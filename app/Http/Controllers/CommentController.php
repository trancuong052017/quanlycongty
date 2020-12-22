<?php

namespace App\Http\Controllers;
use App\TinTuc;
use App\Comment;
use Illuminate\Http\Request;
//use App\Http\Requests;

class CommentController extends Controller
{  public  function getDanhSach()
  { //dd('halo');
    $comment =Comment::all();
    //dd($Comment);
    return view('admin.Comment.danhsach',['comment'=>$comment]);
  }
   /////////////////////////////////////////////////////////  


    	
    	 public function getXoa($id){
            //dd($id);
    	 	$Comment = Comment::find($id);
        
        $Comment->delete();
    	return redirect('admin/comment/danhsach')->with('thongbao','xoa thanh cong');
      
    }
}
