<?php

namespace App\Providers;
use App\Slide ;
use App\TheLoai ;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
     // $slide= Slide::all();
    //view()->share('slide',$slide);//chuyen slide sang view  
   // $theloai= TheLoai::all();
    //dd($theloai);
   // view()->share('theloai',$theloai);//chuyen theloai sang tatca cac view khi goi pagecomtroller
    }
}
