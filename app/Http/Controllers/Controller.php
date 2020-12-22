<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Theloai;
use App\User;
use App\Slide;
use App\Http\Controllers\Controller;
class Controller extends BaseController
{ 
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function  __construct()
  {  //dd('halocon');
    
    /* $slide= Slide::all();
    view()->share('slide',$slide);//chuyen slide sang view  
    
    $theloai= TheLoai::all();
    view()->share('theloai',$theloai);//chuyen theloai sang tatca cac view khi goi pagecomtroller
     */
   	
    }
}
