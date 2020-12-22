<?php

namespace App\Http\Controllers;
use DB;
use  File;
use Illuminate\Http\Request;
use Mail;
use App\User;
class GuiemailController extends Controller
{
    
 public function getGuiemail() {
    return view('admin.guimail.guimail');
   }
 
public function postGuiemail( Request $request) {
         if($request->hasFile('file')){
         $file =$request->file('file');
         
        //dd($file);
         $filename=$file->getClientOriginalName();
         $upload_file= $file->move("public/upload/guifile",$filename);
       // $file=$upload_file['full_path'];
        $file=$upload_file->getrealPath();
         }
         else{$file="";
        }
        if(isset($request->tieude)){
         $tieude=$request->tieude;	
        }
      else{$tieude = "";}
       
       $to_mail=$request->to_email;
        $data =[
         'noidung'=>$request->noidung,
        ];
        //try{
        Mail::send('admin.guimail.mail_nhan',$data, function($message) use($to_mail,$tieude,$file){
	        $message->from('trancuong052017@gmail.com', 'cuong gui');
	        if($file!=null){
	        	
	          $message->attach($file);
	        }
	        $message->to($to_mail);
	        $message->subject($tieude);
	      
	    });
	    if(isset($filename)){
	     $image_link = 'public/upload/guifile/'.$filename;
	     
	      if(File::exists($image_link))
        {
            File::delete(($image_link));
        }
      }
	     //DB::commit();
        return redirect('admin/guiemail')->with('thongbao','gui thanh cong');
       /* }
        catch(\Exception $exception)
         {
          DB::rollback();
           return redirect('admin/guiemail')->with('loi','gui khong thanh cong');
         }*/
       
         
         }
		 // Send Gmail to another user nhieu mail
   public function postGuinhieu_email(Request $request)
   {   // $to_mail=$request->to_email;
   	   // dd($request->ids);
        $ids = $request->ids;
		$tieude=$request->title;
		 $data =[
         'noidung'=>$request->message,
        ];
		try{
		 foreach ($ids as $id)
		
        {
           $this->_send_mail($id,$tieude,$data);
        }
		  DB::commit();
        return redirect('admin/guinhieu_email')->with('thongbao','gui thanh cong');
	     }
	     catch(\Exception $exception){
            DB::rollback();
           return redirect('admin/guinhieu_email')->with('loi','gui khong thanh cong');
	     }
}
function getGuinhieu_email(){ //lay tong so luong ta ca cac email t
		
       $user=User::all();
     return view('admin.guimail.guinhieu_email',compact('user'));  
    }
/////////////////////////gui  nhieu mail
public function _send_mail($id,$tieude,$data) {
	      $user =User::find($id);
	      $to_mail=$user->email;
		 try{
        Mail::send('admin.guimail.mail_nhan',$data, function($message) use($to_mail,$tieude){
	        $message->from('trancuong052017@gmail.com', 'cuong gui');
	        
	        $message->to($to_mail);
	        $message->subject($tieude);
	      
	    });
	   
	     DB::commit();
        return redirect('admin/guinhieu_email')->with('thongbao','gui thanh cong');
        }
        catch(\Exception $exception)
         {
          DB::rollback();
           return redirect('admin/guinhieu_email')->with('loi','gui khong thanh cong');
         }
       
			     
         
}

} 

