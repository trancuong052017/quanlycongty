<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc ;
use App\LoaiTin ;
use App\TheLoai ;
use App\User ;
use App\role ;
use App\Luong;
use App\Dungcu;
use App\DanhsachDungcu;
use DB;
class TestController extends Controller
{
public function getTest(){
	$danhsach =DanhsachDungcu::find(2);
	$dungcu=$danhsach->dungcu;
	$top_car_brands =["Toyota", "Honda", "BMW", "Ford", "Hyundai"];
$top_car_brands[5] = "Mercedes";
//$top_car_brands = json_encode($top_car_brands);
dd($top_car_brands);
/*$role= role::find(31);
//dd($role);
$role =$role->user ;
dd($role);*/
//$tintuc =TheLoai::find(2);
//dd($tintuc );
/*$tintuc =$tintuc->loaitin;
dd($tintuc);*/
/*$user =User::find(14);
$user= $user->roles ;
dd($user);*/
/*$person = array (
   'firstname' => 'Vượng',
   'lastname' => 'Nguyễn'
);
 //dd($person);
$p = (object)$person;
//dd($p);
echo $p->firstname; echo $p->lastname; // Kết quả "Vượng"*/

/*
	$danhsach = array("Nam", "Cuong", "Hoa", "Phuong");
 
	if (in_array("C", $danhsach))
	{
		echo "Tim thay";
	}
	else
	{
			echo "khong tim thay";
		}
		}
	}*/
	
	/*$madungcu=DB::table('dungcu')->where('iduser',1)->where('madungcu',20)->first();
	//$madungcu->result();
dd($madungcu);*/
/*
$ma=Dungcu::where('madungcu',20)->where('iduser',1)->first();
dd($ma->soluong);
$p = (object)$ma;
dd($p);/**/
	/*$search_array = array('first' => 1, 'first1' => 4);
if (array_key_exists( 'first', $search_array)) 
  {
    foreach($search_array as $ar)
    {
    	/*if($ar==$request)
    	{
    		echo $ar;
    	}
    	echo $ar;
    	
    }
  }
  else{echo 'khong ton tai';

       } */


   /*  $madungcu =6;
     
     foreach($dungcu as $dungcu){
	if ($dungcu->madungcu ==$madungcu)
	{
		$dungcu =Dungcu::find($dungcu->id);
		dd($dungcu) ;
	}
	
	}
	
    // echo 'khong thay';
	  		*/
}
}