<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangchuController extends Controller
{
    public function getXem(){
    	return view('admin.trangchu');
    }
}
