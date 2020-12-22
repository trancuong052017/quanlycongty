<?php 
namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin ;
use App\Congtrinh;
class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
    	//dd($idTheLoai);
    	$loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
    	//dd($loaitin);
     foreach($loaitin as $lt){
     	echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
      }
     }
     public function getUser($idcongtrinh){
    	  //dd($idcongtrinh);
    	$congtrinh = Congtrinh::find($idcongtrinh);
         $user=$congtrinh->user;
    	
    	
     foreach($user as $user){
     	echo "<option value='".$user->id."' name='iduser'>".$user->name."</option>";
      }
     }
    }