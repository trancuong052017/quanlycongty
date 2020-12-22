<?php

namespace App\Http\Controllers;
use App\bills;
use Illuminate\Http\Request;

class TrangchuController extends Controller
{
     public function getXem(){
      $bills=bills::all();
    	return view('admin.trangchu',compact('bills'));
    }
}
